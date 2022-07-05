<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $exam_id
 * @property string $document_session
 * @property string $document_title
 * @property string $document_type
 * @property string $document_description
 * @property int $document_price
 * @property string $document_path
 * @property string $document_thumbnail
 * @property string $correction_path
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'exam_id',
        'document_session',
        'document_title',
        'document_type',
        'document_description',
        'document_price',
        'document_path',
        'document_thumbnail',
        'correction_path',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, ClassroomDocument::class)
            ->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, DocumentSubject::class)
            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, DocumentUser::class)
        ->withPivot('subscription_type')
        ->withTimestamps();
    }
}
