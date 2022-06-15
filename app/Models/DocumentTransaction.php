<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $transaction_id
 * @property int $document_id
 */
class DocumentTransaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var stringgit 
     */
    protected $table = 'document_transaction';

    /**
     * @var array
     */
    protected $fillable = [];
}
