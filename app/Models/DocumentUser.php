<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $document_id
 */
class DocumentUser extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'document_user';

    /**
     * @var array
     */
    protected $fillable = [];
}
