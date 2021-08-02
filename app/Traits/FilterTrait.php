<?php

namespace App\Traits;

use Illuminate\Pipeline\Pipeline;

trait FilterTrait
{
    public function scopeFilter($query, array $through)
    {
        return app(Pipeline::class)
            ->send($query)
            ->through($through)
            ->thenReturn();
    }
}
