<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
    protected $service;

    protected function service()
    {
        return MessageService::instance();
    }

    public function table(Request $request)
    {
        //获取数据
        $page = get_page();
        $where = request()->input();
        $where['order_by'] = ["order" => "create_time", "desc" => "desc"];
        $result = $this->service()->table($where, ...$page);
        return $this->successWithResult($result);
    }

    public function info($id)
    {
        $result = $this->service()->info($id);
        return $this->successWithResult($result);
    }

    private function valid()
    {
        //验证参数
        $check = $this->_valid([
            'content' => 'required',
        ], [
            'content.required' => '请输入内容',
        ]);

        if (true !== $check) {
            return $this->errorWithMsg($check, 405);
        }
        return true;
    }

    public function save(Request $request)
    {
        $this->valid();
        $data = [
            "content" => $request->input("content"),
            "reply" => $request->input("reply"),
        ];

        $result = $this->service()->save($data);
        return $this->successWithResult($result);
    }

    public function update(Request $request, $id)
    {
        //验证参数
        $this->valid();
        $data = [
            "content" => $request->input("content"),
            "reply" => $request->input("reply"),
        ];

        $result = $this->service()->update($data, $id);
        if (false === $result) {
            return $this->errorWithMsg("修改失败");
        }
        return $this->successWithResult($result);
    }

    public function delete(Request $request)
    {
        $ids = $request->input();
        $result = $this->service()->delete($ids);
        if (false === $result) {
            return $this->errorWithMsg("删除失败");
        }
        return $this->successWithResult($result);
    }

}
