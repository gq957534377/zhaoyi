<?php

namespace App;

use App\Models\Team;
use App\Models\TeamHasUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    // 不允许集体赋值的字段
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 说明: 获取班级信息
     *
     * @return mixed
     * @author 郭庆
     */
    public function getClassAttribute()
    {
        $teamIds = TeamHasUser::where('user_id', $this->id)->pluck('team_id')->toArray();
        return Team::find($teamIds);
    }
}
