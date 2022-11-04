<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $ip
 * @property string $created_at
 * @property string $updated_at
 */

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'created_at',
        'updated_at'
    ];
}
