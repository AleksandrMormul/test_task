<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class RegisterService
{
    /**
     * @param \App\Repositories\UserRepository $users
     * @param \App\Services\UserLinkService $links
     */
    public function __construct(
        protected UserRepository $users,
        protected UserLinkService $links,
    ) {}

    /**
     * @param array $data
     * @return \App\Models\User
     * @throws \Throwable
     */
    public function register(array $data): User
    {
        $user = \DB::transaction(function () use ($data) {
            return $this->users->create([
                'name' => $data['username'],
                'phone' => $data['phone'],
            ]);
        });

        $this->links->generate($user->id);

        return $user;
    }
}
