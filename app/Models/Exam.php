<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $exam_name
 * @property string $exam_type
 * @property int $exam_session
 * @property string $exam_serie
 * @property string $created_at
 * @property string $updated_at
 */
class Exam extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'exam_name',
        'exam_type',
        'exam_session',
        'exam_serie',
        'created_at',
        'updated_at',
    ];
}
