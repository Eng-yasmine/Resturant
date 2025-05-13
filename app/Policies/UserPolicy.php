<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post; // لو عايزة تعمل صلاحيات على موديلات تانية زي Post
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view any users.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        // return $user->role === 'admin';
        return false;
    }

    /**
     * Determine if the given user can view the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        // مثلا، لو اليوزر اللي عايز يشوف صفحة اليوزر ده هو نفس اليوزر أو هو Admin
        // return $user->id === $model->id || $user->role === 'admin';
        return false;
    }

    /**
     * Determine if the given user can update the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        // return $user->id === $model->id;
        return false;
    }

    /**
     * Determine if the given user can delete the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {

        // return $user->role === 'admin';
        return false;
    }
}
