<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class Product extends Model
{
    //
    protected $fillable = ['quantity'];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    public function presentPrice()
    {
        return money_format('$%i', $this->price / 100);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

}
