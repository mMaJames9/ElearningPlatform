<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use LucasDotVin\Soulbscription\Models\Concerns\HasSubscriptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use SoftDeletes;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'classroom_id',
        'name',
        'email',
        'username',
        'phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id')
        ->withPivot('model_type');
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class, DocumentUser::class)
            ->withPivot('subscription_type')
            ->withTimestamps();
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }

    public function subscriptions()
    {
        return $this->HasMany(Subscription::class, 'subscriber_id', 'id');
    }

    public function subscriptionPrices()
    {
        return $this->belongsToMany(Subscription::class, SubscriptionUser::class)
        ->withPivot('subscription_price')
        ->withTimestamps();
    }

    public function getReferrals()
    {
        return ReferralProgram::all()->map(function ($program){
            return ReferralLink::getReferral($this, $program);
        });
    }
}
