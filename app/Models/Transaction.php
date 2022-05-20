<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $transaction_amount
 * @property string $created_at
 * @property string $updated_at
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'transaction_amount',
        'created_at',
        'updated_at',
    ];
}
