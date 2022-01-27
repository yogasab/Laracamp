<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email',
        'card_number',
        'expired',
        'cvc',
        'is_paid',
        'user_id',
        'camp_id'
    ];

    // Set to current method while create new data
    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = date('Y-m-t', strtotime($value));
    }

    public function camp(): BelongsTo
    {
        return $this->belongsTo(Camp::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
