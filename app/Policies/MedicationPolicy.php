<?php

namespace App\Policies;

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class MedicationPolicy
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
