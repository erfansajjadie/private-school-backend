<?php

namespace App\Helpers;

class UploadFileHelper
{
    public static function upload ($image, $folder)
    {
       self::delete($image);
        return $image->store($folder, ['disk' => 'public']);
    }

    public static  function delete($image): void
    {
        try {
            unlink(storage_path('app/public/' .  $image));
        } catch (\Exception $e) {
        }
    }

}
