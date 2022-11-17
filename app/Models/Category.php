<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=['category_name','cover'];



    public function product(){
        return $this->Hasmany(Products::class,'category_id','category_name');
    }

    public function parent(){
        return $this->hasMany(Products::class,'category_id');
    }



}
