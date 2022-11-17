<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table='blogs';
    protected $fillable=['blog_title','blog_description','blog_status','blog_image'];
}
