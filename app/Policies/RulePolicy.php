<?php

namespace App\Policies;

use App\Models\Rule;
use App\Traits\PermissionCheckTrait;

class RulePolicy
{
    use PermissionCheckTrait;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user): bool
    {
        return $this->hasPermission($user, 'الاسنعلام عن الادوار');
    }

    public function view($user): bool
    {
        return $this->hasPermission($user, 'الاسنعلام عن دور');
    }

    public function create($user): bool
    {
        return $this->hasPermission($user, 'اضافة دور');
    }

    public function update($user): bool
    {
        return $this->hasPermission($user, 'تعديل دور');
    }

    public function delete($user): bool
    {
        return $this->hasPermission($user, 'حذف دور');
    }

    public function restore($user, Rule $rule): bool
    {
        return false; // Placeholder for any specific condition if needed
    }

    public function forceDelete($user, Rule $rule): bool
    {
        return false; // Placeholder for any specific condition if needed
    }
}
