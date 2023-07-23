<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}
public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

}
