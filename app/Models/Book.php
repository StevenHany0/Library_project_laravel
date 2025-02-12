<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     use HasFactory;

     protected $fillable = ['name', 'description', 'price','author','image','author_id'];


     public function author()
     {
         return $this->hasone(Author::class);
     }
   
}

