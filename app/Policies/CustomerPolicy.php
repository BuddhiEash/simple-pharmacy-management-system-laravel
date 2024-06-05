<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;

class CustomerPolicy
{
    public function create(): bool
    {
        return Auth::user()->user_role_id === UserRole::OWNER->value;
    }

    public function update(): bool
    {
        return Auth::user()->user_role_id === UserRole::OWNER->value || UserRole::CASHIER->value;
    }

    public function delete(): bool
    {
        return Auth::user()->user_role_id === UserRole::OWNER->value;
    }
}
