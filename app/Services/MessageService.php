<?php

namespace App\Services;

use App\Models\Message;

class MessageService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new Message());
    }

    private static $_object = null;

    public static function instance()
    {
        if (empty(self::$_object)) {
            self::$_object = new MessageService(); //内部方法可以调用私有方法，因此这里可以创建对象
        }
        return self::$_object;
    }

    public static function table($param = [], int $page = null, int $size = 15)
    {
        $query = self::$model->query();
        if (isset($param['content']) && !empty($param['content'])) {
            $query = $query->where("content", "like", "%{$param['content']}%");
        }
        return self::$model->ModelSearch($query, $param, $page, $size);
    }

}
