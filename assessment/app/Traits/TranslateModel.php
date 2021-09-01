<?php

namespace App\Traits;

use App\Helpers\Localization;

trait TranslateModel
{
    private function getAtt($key)
    {
        json_decode($key);
        if (json_last_error() === JSON_ERROR_NONE) {
            return (Localization::getlocale() != '*') ? json_decode($key)->{(Localization::getlocale())} : json_decode($key);
        } else
            return $key;
    }

    private function setAtt($key,$attr)
    {
        $this->attributes[$attr]= is_array($key) ? json_encode($key) : $key;
    }

    public function getNameAttribute($key)
    {
        return $this->getAtt($key);
    }
    public function setNameAttribute($key)
    {
        $this->setAtt($key,'name');
    }

    public function getTitleAttribute($key)
    {
        return $this->getAtt($key);
    }
    public function setTitleAttribute($key)
    {
        $this->setAtt($key,'title');
    }

    public function getContentAttribute($key)
    {
        return $this->getAtt($key);
    }
    public function setContentAttribute($key)
    {
        $this->setAtt($key,'content');
    }
}