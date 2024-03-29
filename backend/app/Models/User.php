<?php

namespace App\Models;

use App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;


class User extends AuthUser
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute(string $secret)
    {
        $this->attributes['password'] = Hash::make( $secret );
    }
}
