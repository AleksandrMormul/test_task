<?php

namespace App\Http\Controllers;

use App\Repositories\UserLinkRepository;
use App\Services\LuckyService;
use Illuminate\Routing\Controller;

class LuckyController extends Controller
{
    public function __construct(
        protected UserLinkRepository $link,
        protected LuckyService $luckyService,
    ) {}

    /**
     * @param string $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View|object
     * @throws \Random\RandomException
     */
    public function checkLucky(string $token)
    {
        $link = $this->link->findByLink($token);

        if ( ! $link || $link->isExpired()) {
            abort(404, 'Link expired or not found');
        }

        $game = $this->luckyService->play($link->user_id);

        return view('page-a', [
            'game' => $game,
            'link' => $link,
        ]);
    }

    public function history(string $token)
    {
        $link = $this->link->findByLink($token);

        if ( ! $link || $link->isExpired()) {
            abort(404, 'Link expired or not found');
        }

        $history = $this->luckyService->getHistory($link->user_id);

        return view('game-history', compact('history'));
    }
}
