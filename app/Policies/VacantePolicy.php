<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantePolicy
{
    use HandlesAuthorization;
    // doc https://laravel.com/docs/9.x/authorization#authorizing-resource-controllers

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User                        $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny( User $user )
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User                        $user
     * @param  \App\Models\Vacante                     $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(
        User $user,
        Vacante $vacante
    ) {
        // Permitir ver solo las vacantes que el usuario haya creado
        // return $user->id === $vacante->usuario_id;
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User                        $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create( User $user )
    {
        // Permitir crear vacantes solo si el usuario esta registrado
        return $user->id !== null;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User                        $user
     * @param  \App\Models\Vacante                     $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(
        User $user,
        Vacante $vacante
    ) {
        // Permitir actualizar solo las vacantes que el usuario haya creado
        return $user->id === $vacante->usuario_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User                        $user
     * @param  \App\Models\Vacante                     $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(
        User $user,
        Vacante $vacante
    ) {
        // Permitir eliminar solo las vacantes que el usuario haya creado
        return $user->id === $vacante->usuario_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User                        $user
     * @param  \App\Models\Vacante                     $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(
        User $user,
        Vacante $vacante
    ) {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User                        $user
     * @param  \App\Models\Vacante                     $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(
        User $user,
        Vacante $vacante
    ) {
        //
    }
}
