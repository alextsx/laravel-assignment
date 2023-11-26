<?php

namespace App\Policies;

use App\Exceptions\NotAnAdminException;
use App\Models\User;
use App\Exceptions\NotAPremiumUserException;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehicleDamageEventPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $this->checkIsPremium($user);
    }

    public function create(User $user)
    {
        return $this->checkIsAdmin($user);
    }

    public function update(User $user)
    {
        return $this->checkIsAdmin($user);
    }

    public function delete(User $user)
    {
        return $this->checkIsAdmin($user);
    }

    private function checkIsAdmin(User $user): bool
    {
        if (!$user->isAdmin) {
            throw new NotAnAdminException('You must be an administrator to perform this action.');
        }

        return true;
    }

    private function checkIsPremium(User $user): bool
    {
        if (!$user->isPremium) {
            throw new NotAPremiumUserException('You must be a premium user to perform this action.');
        }

        return true;
    }
}