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
     * @throws \Throwable
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->service->register($request->validated());
    }
}
