<?php

namespace App\Services;

use App\Repositories\GameRepository;

class LuckyService
{
    public function __construct(protected GameRepository $games) {}

    /**
     * @param int $userId
     * @return \App\Models\Game
     * @throws \Random\RandomException
     */
    public function play(int $userId): \App\Models\Game
    {
        $randomNumber = random_int(1, 1000);
        $result = ($randomNumber % 2 === 0) ? 'Win' : 'Lose';
        $winAmount = $result === 'Win' ? $randomNumber * $this->getWinMultiplier($randomNumber) : 0;

        return $this->games->create([
            'user_id' => $userId,
            'game_result' => $randomNumber,
            'result' => $result,
            'win_amount' => round($winAmount, 2),
        ]);
    }

    public function getHistory(int $userId)
    {
        return $this->games->getByUser($userId);
    }

    /**
     * @param int $number
     * @return float
     */
    protected function getWinMultiplier(int $number): float
    {
        return match(true) {
            $number > 900 => 0.7,
            $number > 600 => 0.5,
            $number > 300 => 0.3,
            default => 0.1,
        };
    }
}
