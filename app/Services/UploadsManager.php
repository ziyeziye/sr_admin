<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Dflydev\ApacheMimeTypes\PhpRepository;

class UploadsManager
{
    protected $disk;
    protected $webPath;
    protected $mimeDetect;

    /**
     * UploadsManager constructor.
     * @param string $disk
     * @param string $webPath
     * @param PhpRepository $mimeDetect
     */
    public function __construct(PhpRepository $mimeDetect, $disk = "public", $webPath = "")
    {
        $this->disk = Storage::disk($disk);
        $this->webPath = $webPath;
        $this->mimeDetect = $mimeDetect;
    }

    /**
     * Return files and directories within a folder
     *
     * @param string $folder
     * @return array of [
     *     'folder' => 'path to current folder',
     *     'folderName' => 'name of just current folder',
     *     'breadCrumbs' => breadcrumb array of [ $path => $foldername ]
     *     'folders' => array of [ $path => $foldername] of each subfolder
     *     'files' => array of file details on each file in folder
     * ]
     */
    public function folderInfo($folder)
    {
        $folder = $this->cleanFolder($folder);

        $breadcrumbs = $this->breadcrumbs($folder);
        $slice = array_slice($breadcrumbs, -1);
        $folderName = current($slice);
        $breadcrumbs = array_slice($breadcrumbs, 0, -1);

        $subfolders = [];
        foreach (array_unique($this->disk->directories($folder)) as $subfolder) {
            $subfolders["/$subfolder"] = basename($subfolder);
        }

        $files = [];
        foreach ($this->disk->files($folder) as $path) {
            $files[] = $this->fileDetails($path);
        }

        return compact(
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );
    }

    /**
     * Sanitize the folder name
     */
    protected function cleanFolder($folder)
    {
        return '/' . trim(str_replace('..', '', $folder), '/');
    }

    /**
     * 返回当前目录路径
     */
    protected function breadcrumbs($folder)
    {
        $folder = trim($folder, '/');
        $crumbs = ['/' => 'root'];

        if (empty($folder)) {
            return $crumbs;
        }

        $folders = explode('/', $folder);
        $build = '';
        foreach ($folders as $folder) {
            $build .= '/' . $folder;
            $crumbs[$build] = $folder;
        }

        return $crumbs;
    }

    /**
     * 返回文件详细信息数组
     */
    protected function fileDetails($path)
    {
        $path = '/' . ltrim($path, '/');

        return [
            'name' => basename($path),
            'fullPath' => $path,
            'webPath' => $this->fileWebpath($path),
            'mimeType' => $this->fileMimeType($path),
            'size' => $this->fileSize($path),
            'modified' => $this->fileModified($path),
        ];
    }

    /**
     * 返回文件完整的web路径
     */
    public function fileWebpath($path)
    {
        $path = rtrim($this->webPath, '/') . '/' . ltrim($path, '/');
        return url($path);
    }

    /**
     * 返回文件MIME类型
     */
    public function fileMimeType($path)
    {
        return $this->mimeDetect->findType(
            pathinfo($path, PATHINFO_EXTENSION)
        );
    }

    /**
     * 返回文件大小
     */
    public function fileSize($path)
    {
        return $this->disk->size($path);
    }

    /**
     * 返回最后修改时间
     */
    public function fileModified($path)
    {
        return Carbon::createFromTimestamp(
            $this->disk->lastModified($path)
        );
    }

    /**
     * 创建新目录
     */
    public function createDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        if ($this->disk->exists($folder)) {
            return "Folder '$folder' already exists.";
        }

        return $this->disk->makeDirectory($folder);
    }

    /**
     * 删除目录
     */
    public function deleteDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        $filesFolders = array_merge(
            $this->disk->directories($folder),
            $this->disk->files($folder)
        );
        if (!empty($filesFolders)) {
            return "Directory must be empty to delete it.";
        }

        return $this->disk->deleteDirectory($folder);
    }

    /**
     * 删除文件
     */
    public function deleteFile($path)
    {
        $path = $this->cleanFolder($path);

        if (!$this->disk->exists($path)) {
            return "File does not exist.";
        }

        return $this->disk->delete($path);
    }

    public function uploadImg(UploadedFile $file, $fileName = false, $maxSize = false)
    {
        // 1.是否上传成功
        if (!$file->isValid()) {
            return false;
        }
        $tmpFile = $file->getRealPath();
        // 2.是否符合文件类型 getClientOriginalExtension 获得文件后缀名
        $fileExtension = $file->getClientOriginalExtension();
        if (!in_array($fileExtension, ['png', 'jpg', 'gif'])) {
            return false;
        }

        // 3.判断大小是否符合 2M => $maxSize=2048000
        if (is_numeric($maxSize) && filesize($tmpFile) >= $maxSize) {
            return false;
        }

        // 4.是否是通过http请求表单提交的文件
        if (!is_uploaded_file($tmpFile)) {
            return false;
        }

        // 5.每天一个文件夹,分开存储, 生成一个随机文件名
        if (!$fileName) {
            $fileName = date('Y_m_d') . '/' . md5(time()) . mt_rand(0, 9999) . '.' . $fileExtension;
        }
        if ($this->saveFile($fileName, file_get_contents($tmpFile))) {
            return Storage::url($fileName);
        }

        return false;
    }

    /**
     * 保存文件
     */
    public function saveFile($path, $content)
    {
        $path = $this->cleanFolder($path);

        if ($this->disk->exists($path)) {
            return "File already exists.";
        }

        return $this->disk->put($path, $content);
    }
}
