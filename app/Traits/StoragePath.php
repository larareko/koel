<?php 

namespace App\Traits;

use Storage;

trait StoragePath {
    
    /**
     * @return string
     */
    private function storagePath()
    {
        return Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
    }
}