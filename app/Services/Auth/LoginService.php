<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $data): array
    {
        if (empty($data['email']) || empty($data['password'])) {
            return [
                'success' => false,
                'message' => 'E-pasts vai parole ir nepieciešama'
            ];
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Šāds e-pasts nav reģistrēts'
            ];
        }

        if (!Hash::check($data['password'], $user->password)) {
            return [
                'success' => false,
                'message' => 'Nepareiza paroles'
            ];
        }

        Auth::login($user);

        return ['success' => true, 'user' => $user];
    }
}