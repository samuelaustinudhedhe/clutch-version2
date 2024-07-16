<?php

use Illuminate\Database\Eloquent\Builder;

/**
 * Registers custom macros for the Eloquent Builder.
 * 
 * This function checks if the 'registerBuilderMacros' function does not already exist,
 * and if not, it defines it. The function registers two macros:
 * 
 * 1. 'orderBy': Adds an 'orderBy' clause to the query.
 * 2. 'search': Adds a 'where' clause to the query to search for a string within a specified field.
 */
if (! function_exists('registerBuilderMacros')) {
    /**
     * Registers custom macros for the Eloquent Builder.
     */
    function registerBuilderMacros():void
    {
        /**
         * Adds an 'orderBy' clause to the query.
         *
         * @param string $column The column to order by.
         * @param string $direction The direction to order by (default is 'asc').
         * @return \Illuminate\Database\Eloquent\Builder
         */
        Builder::macro('orderBy', function ($column, $direction = 'asc') {
            return $this->orderBy($column, $direction);
        });

        /**
         * Adds a 'where' clause to the query to search for a string within a specified field.
         *
         * @param string $field The field to search within.
         * @param string $string The string to search for.
         * @return \Illuminate\Database\Eloquent\Builder
         */
        Builder::macro('search', function ($field, $string) {
            return $this->where($field, 'like', '%' . $string . '%');
        });
    }
}