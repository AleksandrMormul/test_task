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

    /**
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function regenerate(string $token): \Illuminate\Http\RedirectResponse
    {
        $link = $this->links->findByLink($token);

        if ( ! $link) {
            abort(404, 'Link not found');
        }

        $newLink = $this->service->generate($link->user_id);
        return redirect()->route('link.show', $newLink->link)
            ->with('success', 'Link regenerated');
    }

    /**
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function deactivate(string $token): \Illuminate\Http\RedirectResponse
    {
        $link = $this->links->findByLink($token);

        if ( ! $link) {
            abort(404, 'Link not found');
        }

        $this->service->deactivate($link);

        return redirect()->route('register.form')
            ->with('success', 'Link deactivated');
    }
}
