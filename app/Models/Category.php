<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['name','name_ar','user_id','image','visible'];

    function getNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->name;
        } else {
            return $this->name_ar;
        }
    }
    public function getImageAttribute($value)
    {
        return $value ? url('storage/' . $value) : '';
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
