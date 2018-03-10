<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // 不允许集体赋值的字段
    protected $guarded = [];

    /**
     * 说明: 获取代课老师信息
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author 郭庆
     */
    public function teacher()
    {
        return $this->hasOne('App\User','id','teacher_id');
    }
}
