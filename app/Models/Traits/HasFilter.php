<?php

namespace App\Models\Traits;

use App\Http\Filters\WorkerFirst\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->applyFilter($builder);
        return $builder;
    }
}
