<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;


class MerchantUser extends Authuser
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','logo','document', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
     protected $hidden = [
        'password' , 'document'
    ];

    public function setPasswordAttribute(string $secret)
    {
          $this->attributes['password'] = Hash::make( $secret );
    }
}
