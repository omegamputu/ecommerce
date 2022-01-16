<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['name', 'email', 'ville', 'country', 'phone', 'adresse'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
