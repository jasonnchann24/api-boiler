<?php

namespace App\Filters;

class UserFilter
{

    public function handle($query, $next)
    {
        if (request()->has('search') && request()->get('search')) {
            $query->where(function ($q) {
                $q->where('name', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('email', 'LIKE', '%' . request('search') . '%');
            });
        }

        $next($query);
    }
}
