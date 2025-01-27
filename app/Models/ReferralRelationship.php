<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralRelationship extends Model
{
    use HasFactory;

    protected $fillable = ['referral_link_id', 'user_id'];

    public function referralLink()
    {
        return $this->belongsTo(ReferralLink::class, 'referral_link_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
