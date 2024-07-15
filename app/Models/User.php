<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'company_name_ar',
        'f_name',
        'l_name',
        'f_name_ar',
        'l_name_ar',
        'email',
        'password',
        'description',
        'description_ar',
        'whatsapp',
        'instagram',
        'country',
        'state',
        'phone',
        'plan_expiry',
        'image',
        'background',
        'menu_url',
        'visible',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Accessor for the name attribute
    function getCompanyNameLangAttribute()
    {
        if (app()->getLocale() == 'en') {
            return $this->company_name;
        } else {
            return $this->company_name_ar;
        }
    }

//
//    // Accessor for the description attribute
    public function getDescriptionLangAttribute()
    {
        if (app()->getLocale() === 'en') {
            return $this->description;
        } else {
            return $this->description_ar;
        }
    }
    public function getImageAttribute($value)
    {
        return $value ? url('storage/' . $value) : asset('assets/site/images/logo.png');
    }
    public function getBackgroundAttribute($value)
    {
        return $value ? url('storage/' . $value) : asset('assets/site/images/background.jpg');
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }

}
