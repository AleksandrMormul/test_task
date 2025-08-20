<?php

namespace App\Repositories;

use App\Models\UserLink;
use Carbon\Carbon;

class UserLinkRepository
{
    /**
     * @param int $userId
     * @param string $token
     * @param \Carbon\Carbon $expire
     * @return \App\Models\UserLink
     */
    public function upsert(int $userId, string $token, Carbon $expire): UserLink
    {
        return UserLink::updateOrCreate(
            ['user_id' => $userId],
            [
                'link'        => $token,
                'date_expire' => $expire,
            ]
        );
    }

    /**
     * @param string $link
     * @return \App\Models\UserLink|null
     */
    public function findByLink(string $link): ?UserLink
    {
        return UserLink::where('link', $link)->first();
    }
}
