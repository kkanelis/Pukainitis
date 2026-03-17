<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\LoginService;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy() {
        Auth::logout();
        return redirect("/");
    }

    public function create(Request $request) {
        return view("auth.login");
    }

    public function store(Request $request, LoginService $loginService)
    {
        $result = $loginService->login($request->only('email','password'));

        return redirect("/");
    }
}
