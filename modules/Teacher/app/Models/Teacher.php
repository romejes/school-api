<?php

namespace SchoolApi\Teacher\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SchoolApi\Teacher\Database\Factories\TeacherFactory;

class Teacher extends Model
{
    use HasFactory;

    public $table = "teacher";

    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "phone",
        "address"
    ];

    protected static function newFactory(): TeacherFactory
    {
        return TeacherFactory::new();
    }
}
