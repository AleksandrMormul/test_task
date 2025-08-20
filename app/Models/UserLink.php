<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $link
 * @property \Carbon\Carbon $date_expire
 */
class UserLink extends Model
{
    protected $fillable = [
        'user_id',
        'link',
        'date_expire',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return now()->gt($this->date_expire);
    }
}
