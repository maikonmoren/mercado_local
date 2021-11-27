<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;


class Store extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name', 'description'
    ];

    protected $appends = [
        'categories',
        'creator'
    ];

    public function getCreatorAttribute()
    {
        return $this->creator()->select('name','id','email')->get();
    }

    public function creator()
    {
        return $this->belongsTo(MerchantUser::class , 'created_by');
    }

    public function getCategoriesAttribute()
    {
        return $this->categories()->get();
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'store_categories'
        );
    }
}
