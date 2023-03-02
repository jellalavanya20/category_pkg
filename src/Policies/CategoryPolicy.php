<?php

namespace Indianic\Category\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any cms pages.
     *
     * @param Admin $user
     * @return bool
     */
    public function viewAny(Admin $user): bool
    {
        return $user->hasPermissionTo('view category');
    }

    /**
     * Determine whether the user can view the cms page.
     *
     * @param Admin $user
     * @return bool
     */
    public function view(Admin $user): bool
    {
        return $user->hasPermissionTo('view category');
    }

    /**
     * Determine whether the user can create cms page.
     *
     * @param Admin $user
     * @return bool
     */
    public function create(Admin $user): bool
    {
        return $user->hasPermissionTo('create category');
    }

    /**
     * Determine whether the user can update the cms page.
     *
     * @param Admin $user
     * @return bool
     */
    public function update(Admin $user): bool
    {
        return $user->hasPermissionTo('update category');
    }

    /**
     * Determine whether the user can delete the cms page.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function delete(Admin $user): Response|bool
    {
        return $user->hasPermissionTo('delete category');
    }
}
