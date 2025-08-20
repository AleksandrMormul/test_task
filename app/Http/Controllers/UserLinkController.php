<?php

namespace App\Http\Controllers;

use App\Repositories\UserLinkRepository;
use App\Services\UserLinkService;
use Illuminate\Routing\Controller;

class UserLinkController extends Controller
{
    /**
     * @param \App\Repositories\UserLinkRepository $links
     * @param \App\Services\UserLinkService $service
     */
    public function __construct(
        protected UserLinkRepository $links,
        protected UserLinkService $service
    ) {}

    public function show(string $token)
    {
        $link = $this->links->findByLink($token);

        if ( ! $link || $link->isExpired()) {
            abort(404, 'Link expired or not found');
        }

        return view('page-a', compact('link'));
    }

    public function regenerate(int $userId)
    {
        $link = $this->service->generate($userId);
        return redirect()->route('link.show', $link->link)
            ->with('success', 'Link regenerated');
    }
}
