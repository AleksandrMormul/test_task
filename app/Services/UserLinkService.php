<?php

namespace App\Services;

use App\Models\UserLink;
use App\Repositories\UserLinkRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserLinkService
{
    public const LINK_EXPIRE = 7;

    /**
     * @param \App\Repositories\UserLinkRepository $links
     */
    public function __construct(
        protected UserLinkRepository $links
    ) {}

    /**
     * @param int $userId
     * @return \App\Models\UserLink
     * @throws \Throwable
     */
    public function generate(int $userId): UserLink
    {
        $token = Str::uuid()->toString();
        $expire = Carbon::now()->addDays(self::LINK_EXPIRE);

        return \DB::transaction(function () use ($userId, $token, $expire) {
            return $this->links->upsert($userId, $token, $expire);
        });
    }

    /**
     * @param \App\Models\UserLink $link
     * @throws \Throwable
     */
    public function deactivate(UserLink $link): void
    {
        \DB::transaction(function () use ($link) {
            return $link->delete();
        });
    }
}
