<?php

namespace SchoolApi\Subject\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SchoolApi\Subject\Database\Factories\SubjectFactory;

/**
 * Modelo que define una asignatura
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Subject extends Model
{
    use HasFactory;

    public $table = "subject";

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "code",
        "name",
        "active"
    ];

    protected $casts = [
        "active" => "boolean"
    ];

    /**
     * Crear factory
     * @return SubjectFactory
     */
    protected static function newFactory(): SubjectFactory
    {
        return SubjectFactory::new();
    }
}
