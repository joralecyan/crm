<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 25.07.2019
 * Time: 14:59
 */

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileService
{
    /**
     * Save image
     * @param $file
     * @param $object
     * @param $path
     * @param $field
     */
    public function saveImage($file, $object, $path, $field = 'image')
    {
        $imageFileName = time() . rand(1000000, 9999999) . '.' . $file->getClientOriginalExtension();
        $storage = Storage::disk(config('filesystems.default'));
        $storage->put('/'. $path . '/' . $imageFileName, file_get_contents($file), 'public');

        $img = Image::make($file)->resize('380', null, function ($constraint) {
            $constraint->aspectRatio();
        })->response();
        $storage->put('/thumb/' . $path . '/' . $imageFileName, $img->getContent(), 'public');

        $object->$field = $path . '/' . $imageFileName;
        $object->save();
    }


    /**
     * Save image
     * @param $file
     * @param $object
     * @param $field
     */
    public function saveFile($file, $object, $field = 'file')
    {
        $fileName = time() . rand(1000000, 9999999) . '.' . $file->getClientOriginalExtension();
        $storage = Storage::disk(config('filesystems.default'));
        $storage->put('/files/' . $fileName, file_get_contents($file), 'public');
        $object->$field = $fileName;
        $object->save();
    }
}
