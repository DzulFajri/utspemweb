<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'day',
        'employee_name',
        'working_hours',
        'attendance_status',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'schedules';
}
