<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        // 'user_id',
        // 'title',
        // //'description',
        // 'department_id',
        // 'body'
    ];
    public function courses(){//many to many between course & user
        return $this->belongsToMany('App\Models\Course','course_room_user')->withPivot('user_id','room_id','date','time');
    }
    public function users(){//many to many between course & user
        return $this->belongsToMany('App\Models\User','course_room_user')->withPivot('course_id','room_id','date','time');
    }
}