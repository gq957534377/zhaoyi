<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Team extends Model
{
    // 不允许集体赋值的字段
    protected $guarded = [];

    /**
     * 说明: 获取班级学生
     *
     * @return mixed
     * @author 郭庆
     */
    public function getStudentsAttribute()
    {
        $studentIds = Role::where('name','student')->first()->users->pluck('id')??[];
        $studentIds = TeamHasUser::where('team_id',$this->id)->whereIn('user_id',$studentIds)->pluck('user_id')->toArray();
        return User::find($studentIds);
    }
}
