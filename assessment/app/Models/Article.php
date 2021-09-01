<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TranslateModel;

class Article extends Model
{
    use TranslateModel;
    public $translatable = ['title', 'content'];

    protected $guarded = [];
}
