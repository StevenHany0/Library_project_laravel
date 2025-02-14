<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $fillable = ['name', 'bio', 'profile_pic','job_description','email','book_id'];

    public function book()
    {
        return $this->hasone(Book::class);
    }

}
