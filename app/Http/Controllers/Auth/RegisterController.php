<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\UserValidationService;
use App\Services\Auth\UserValidationPrefrencesService;

class RegisterController extends Controller
{
    public function create() {
        return view("auth.register");
    }

    public function createPrefrences() {
        return view("auth.registerPrefrences");
    }

    public function store(Request $request, UserValidationService $validator) {
        $user = $validator->validateStore($request->all());
        $createdUser = User::create($user);
        Auth::login($createdUser);

        return redirect("/registerPrefrences");
    }

    public function storePrefrences(Request $request, UserValidationPrefrencesService $validator) {
        $userPrefrences = $validator->validatePrefrencesStore($request->all());
        Auth::user()->update($userPrefrences);

        return redirect("/");
    }
}