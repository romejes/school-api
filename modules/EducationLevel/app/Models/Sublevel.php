<?php

namespace SchoolApi\EducationLevel\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo que representa los grados que pertencen a un nivel
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 *
 * @property Level $level
 */
class Sublevel extends Model
{
    public $table = "sublevel";

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "code",
        "name",
        "level_id",
    ];

    public $timestamps = false;

    /**
     * Relación con el modelo Level
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Level, Sublevel>
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
