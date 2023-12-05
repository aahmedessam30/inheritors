<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Rental;
use Illuminate\Auth\Access\HandlesAuthorization;

class RentalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_rental::rental');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rental  $rental
     * @return bool
     */
    public function view(User $user, Rental $rental): bool
    {
        return $user->can('view_rental::rental');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_rental::rental');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rental  $rental
     * @return bool
     */
    public function update(User $user, Rental $rental): bool
    {
        return $user->can('update_rental::rental');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rental  $rental
     * @return bool
     */
    public function delete(User $user, Rental $rental): bool
    {
        return $user->can('delete_rental::rental');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_rental::rental');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rental  $rental
     * @return bool
     */
    public function forceDelete(User $user, Rental $rental): bool
    {
        return $user->can('force_delete_rental::rental');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_rental::rental');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rental  $rental
     * @return bool
     */
    public function restore(User $user, Rental $rental): bool
    {
        return $user->can('restore_rental::rental');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_rental::rental');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rental  $rental
     * @return bool
     */
    public function replicate(User $user, Rental $rental): bool
    {
        return $user->can('replicate_rental::rental');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_rental::rental');
    }

}
