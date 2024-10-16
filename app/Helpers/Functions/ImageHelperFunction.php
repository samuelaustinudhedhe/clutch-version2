<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

/**
 * Retrieve the default image for a model.
 *
 * This function returns a default image URL or path when no specific image is associated with the model.
 *
 * @param string $placeholder The placeholder identifier for the image. Defaults to 'image'.
 * @return \App\Models\Attachment|\Illuminate\Support\Collection<TKey, TValue>.
 */
function getPlaceHolder($placeholder = 'image')
{
    // Return the URL or path of the default image
    return (new Admin)->getPlaceholder($placeholder);
}


//make more helper function for images here 
