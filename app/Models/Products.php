<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=['product_name','product_price','product_quantity','product_description','product_image','category_id','product_status'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }



}
