<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $grace_days
 * @property string $name
 * @property int $periodicity
 * @property string $periodicity_type
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Plan extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['grace_days', 'name', 'periodicity', 'periodicity_type', 'deleted_at', 'created_at', 'updated_at'];
}
