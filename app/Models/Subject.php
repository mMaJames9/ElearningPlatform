<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $exam_id
 * @property string $subject_name
 * @property string $created_at
 * @property string $updated_at
 */
class Subject extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'exam_id',
        'subject_name',
        'created_at',
        'updated_at',
    ];
}
