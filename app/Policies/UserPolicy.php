<?php

namespace App\Policies;

use App\Exceptions\NotAnAdminException;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->checkIsAdmin($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $this->checkIsAdmin($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }

    private function checkIsAdmin(User $user): bool
    {
        if (!$user->isAdmin) {
            throw new NotAnAdminException('You must be an administrator to perform this action.');
        }

        return true;
    }
}
