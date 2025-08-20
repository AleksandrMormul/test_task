<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    /**
     * @param \App\Services\RegisterService $service
     */
    public function __construct(
        protected RegisterService $service
    ) {}


    public function showForm()
    {
        return view('register');
    }

    /**
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function register(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = $this->service->register($request->validated());
        $link = $user->link()->first();

        return redirect()
            ->route('link.show', $link->link)
            ->with('success', 'User registered successfully');
    }
}
