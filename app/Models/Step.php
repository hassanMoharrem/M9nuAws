<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = ['title','title_ar','description','description_ar','image','visible'];
    function getTitleLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->title;
        } else {
            return $this->title_ar;
        }
    }
    function getDescriptionLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->description;
        } else {
            return $this->description_ar;
        }
    }
    public function getImageAttribute($value)
    {
        return $value ? url('storage/' . $value) : '';
    }
}
