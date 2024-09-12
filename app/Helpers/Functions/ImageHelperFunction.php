<?php

use Illuminate\Support\Facades\Storage;

/**
 * Get the default image for the model.
 *
 * This function should return a default image URL or path when no specific image is associated with the model.
 *
 * @param int $placeholder (placeholder number)
 * @param array $dimension = ['width'=>'200', 'height'=>'200']
 * @return string The URL or path of the default image.
 */
function getPlaceHolder($placeholder = 'default')
{
     // Return the URL or path of the default image
    $placeHolder = "/assets/images/placeholders/$placeholder";
    return $placeHolder;
}


//make more helper function for images here 
