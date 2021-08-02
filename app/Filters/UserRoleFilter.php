<?php

namespace App\Filters;

use App\Models\Role;

class UserRoleFilter
{

    public function handle($query, $next)
    {
        $roles = Role::all()->pluck('slug')->toArray();
        $roleFilters = [];
        foreach ($roles as $role) {
            if (request()->has($role) && request()->get($role)) {
                array_push($roleFilters, $role);
            }
        }

        $query->whereHas('role', function ($query) use ($roleFilters) {
            return $query->whereIn('slug', $roleFilters);
        });

        $next($query);
    }
}
