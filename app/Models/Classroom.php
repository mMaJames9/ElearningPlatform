<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $classroom_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Classroom extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'classroom_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function documents()
    {
        return $this->belongsToMany(Document::class, ClassroomDocument::class)
            ->withTimestamps();
    }
}
