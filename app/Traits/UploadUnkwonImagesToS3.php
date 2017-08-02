<?php

namespace App\Traits;

use Storage;
use Cache;

trait UploadUnkownImagesToS3 {
    
    private function uploadUnkownImagesToS3()
    {
        if(!Cache::has('unknown-image') && env('STORAGE'))
        {
            Storage::disk(env('STORAGE'))->put(
                self::IMAGE_DIRECTORY.'/unknown-album.png',
                Storage::disk('public')->get('covers/unknown-album.png')
            );
            
            Cache::put('unknown-image', true);
        }
    }
    
}