<?php

namespace App\Http\Filters\WorkerFirst;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function applyFilter(Builder $builder);

}
