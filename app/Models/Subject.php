<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $subject_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'subject_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function documents()
    {
        return $this->belongsToMany(Document::class, DocumentSubject::class)
            ->withTimestamps();
    }

}
