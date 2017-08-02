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
       return $value ? Storage::disk($this->disk())->url(self::IMAGE_DIRECTORY.'/'.$value) : null;
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
        Storage::disk($this->disk())->put(self::IMAGE_DIRECTORY.'/'.$fileName, $binaryData);
    }
    
    private function disk()
    {
        $disk = (bool) env('STORAGE') ? env('STORAGE') : 'public';
        
        $this->setUnkownImgsInS3($disk);
        
        return $disk;
    }
    
    private function setUnkownImgsInS3(string $disk)
    {
        
    }
}