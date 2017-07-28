<?php

namespace App\Traits;

use Storage;

trait ImageStorage {
    
    /**
     * Turn the image name into its absolute URL.
     *
     * @param mixed $value
     *
     * @return string|null
     */
    public function getImageAttribute($value)
    {
       return $value ? Storage::disk(self::DISK)->url(self::IMAGE_DIRECTORY.'/'.$value) : null;
    }
    
    /**
     * Store image localy in our public directory.
     *
     * @param string $fileName
     * @param blob   $binaryData
     *
     * @return null
     */
    public function putImage($fileName, $binaryData)
    {
        Storage::disk(self::DISK)->put(self::IMAGE_DIRECTORY.'/'.$fileName, $binaryData);
    }
}