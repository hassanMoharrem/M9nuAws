<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = ['name','name_ar','description','description_ar','price','category_id','image','visible'];

    function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name;
        } else {
            if ($this->name_ar !== null){
                return $this->name_ar;
            }else{
                return $this->name;
            }

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
