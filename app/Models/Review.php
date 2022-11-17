<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table='reviews';
    protected $fillable=['review_name','review_occupation','review_description','review_image','review_status'];
}
