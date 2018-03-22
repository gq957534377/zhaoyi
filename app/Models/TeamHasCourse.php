<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamHasCourse extends Model
{
    // 不允许集体赋值的字段
    protected $guarded = [];

    /**
     * 说明: 返回课程
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author 赵艺
     */
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    /**
     * 说明: 班级信息
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author 赵艺
     */
    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
