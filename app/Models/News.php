<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // 不允许集体赋值的字段
    protected $guarded = [];

    /**
     * 说明: 返回发送人信息
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author 郭庆
     */
    public function send()
    {
        return $this->hasOne(User::class, 'id', 'send_id');
    }
}
