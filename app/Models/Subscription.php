<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $plan_id
 * @property string $canceled_at
 * @property string $expired_at
 * @property string $grace_days_ended_at
 * @property string $started_at
 * @property string $suppressed_at
 * @property boolean $was_switched
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property string $subscriber_type
 * @property int $subscriber_id
 */
class Subscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['plan_id', 'canceled_at', 'expired_at', 'grace_days_ended_at', 'started_at', 'suppressed_at', 'was_switched', 'deleted_at', 'created_at', 'updated_at', 'subscriber_type', 'subscriber_id'];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'subscriber_id', 'id');
    }

    public function subscriptionPrices()
    {
        return $this->belongsToMany(User::class, SubscriptionUser::class)
        ->withPivot('subscription_price')
        ->withTimestamps();
    }
}
