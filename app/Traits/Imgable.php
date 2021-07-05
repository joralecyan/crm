<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Imgable
{

    /**
     * @param $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        if ($value) {
            return Storage::url($value);
        }
    }

    /**
     * @param $value
     * @return string
     */
    public function getThumbAttribute()
    {
        if ($this->image) {
            return Storage::url('thumb/' . $this->getAttributes()['image']);
        }
    }
}
