<?php

namespace App\Models\Traits;

use App\Http\Filters\IFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param IFilter $iFilter
     * 
     * @return Builder
     */
    public function scopeFilter(Builder $builder, IFilter $iFilter){
        $iFilter->apply($builder);
        return $builder;
    }
}