<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'category_name'];
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}



}
