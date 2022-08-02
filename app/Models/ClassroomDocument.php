<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $document_id
 * @property int $classroom_id
 * @property string $created_at
 * @property string $updated_at
 */

class ClassroomDocument extends Pivot
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classroom_document';

    /**
     * @var array
     */
    protected $fillable = [
        'document_id',
        'classroom_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
