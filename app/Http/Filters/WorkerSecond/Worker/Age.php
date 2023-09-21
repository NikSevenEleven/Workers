<?php

namespace App\Http\Filters\WorkerSecond\Worker;

use Illuminate\Database\Eloquent\Builder;

class Age
{
    public function handle(Builder $builder, \Closure $next)
    {
         if(request('age'))
         {
             $builder->where('age', request('age'));
         }
        return $next($builder);
    }
}
