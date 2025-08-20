<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class RegisterService
{
    /**
     * @param \App\Repositories\UserRepository $users
     */
    public function __construct(
        protected UserRepository $users
    ) {}

    /**
     * @param array $data
     * @return \App\Models\User
     * @throws \Throwable
     */
    public function register(array $data): User
    {
        return \DB::transaction(function () use ($data) {
            return $this->users->create([
                'username' => $data['username'],
                'phone' => $data['phone'],
            ]);
        });

    }
}
