<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    // 不允许集体赋值的字段
    protected $guarded = [];

    /**
     * 说明: 返回课程
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author 郭庆
     */
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
