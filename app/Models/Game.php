<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $game_result
 * @property int $result
 * @property int $win_amount
 * @property \Carbon\Carbon $created_at
 *
 * @property-read \App\Models\User $user
 */
class Game extends Model
{
    protected $fillable = [
        'user_id',
        'game_result',
        'result',
        'win_amount',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
