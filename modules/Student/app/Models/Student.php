<?php

namespace SchoolApi\Student\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SchoolApi\Student\Database\Factories\StudentFactory;

class Student extends Model
{
    use HasFactory;

    public $table = "student";

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "code",
        "first_name",
        "last_name",
        "email",
        "birthday",
        "address",
        "phone"
    ];

    protected static function newFactory(): StudentFactory
    {
        return StudentFactory::new();
    }
}
