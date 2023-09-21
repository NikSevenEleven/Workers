<?php

namespace App\Http\Filters\WorkerFirst;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    private array $params = [];

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function applyFilter(Builder $builder)
    {
        foreach ($this->getCallbacks() as $key => $callback) {
            if(isset($this->params[$key])){
                $this->$callback($builder,$this->params[$key]);
            }
        }
    }

    abstract public function getCallbacks():array;
}
