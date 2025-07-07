<?php

namespace SchoolApi\EducationLevel\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo que representa el nivel educativo
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 */
class Level extends Model
{
    protected $table = "level";

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "code",
        "name"
    ];

    public $timestamps = false;
}
