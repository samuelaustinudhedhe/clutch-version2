<?php

namespace App\View;

use Illuminate\Database\Query\Builder;

class RegisterMacros extends Builder
{
    public static function boot()
    {

        Builder::macro('orderBy', function ($column, $direction = 'asc') {
            return $this->orderBy($column, $direction);
        });

        Builder::macro('search', function ($field, $string) {
            return $this->where($field, 'like', '%' . $string . '%');
        });

        Builder::macro('orderByField', function ($field, $value) {
            return $this->orderByRaw("FIELD($field, ?) DESC", [$value]);
        });
    }
}
