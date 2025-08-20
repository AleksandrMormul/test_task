<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository
{
    public const GAME_HISTORY_LIMIT = 3;

    /**
     * @param array $data
     * @return \App\Models\Game
     */
    public function create(array $data): Game
    {
        return Game::create($data);
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getByUser(int $userId)
    {
        return Game::where('user_id', $userId)->orderByDesc('created_at')->limit(self::GAME_HISTORY_LIMIT)->get();
    }
}
