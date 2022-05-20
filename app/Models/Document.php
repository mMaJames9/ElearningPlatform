<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $subject_id
 * @property string $document_title
 * @property string $document_type
 * @property string $document_description
 * @property int $document_price
 * @property string $document_path
 * @property string $created_at
 * @property string $updated_at
 */
class Document extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'subject_id',
        'document_title',
        'document_type',
        'document_description',
        'document_price',
        'document_path',
        'created_at',
        'updated_at',
    ];
}
