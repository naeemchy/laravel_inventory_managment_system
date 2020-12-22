<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id', 'attendance', 'att_date','att_year','edit_date','month'
    ];
}
