<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $exam_section
 * @property string $exam_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Exam extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'exam_section',
        'exam_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
