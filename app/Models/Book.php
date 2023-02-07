<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'page_count',
        'author_id',
        'category_id'
    ];

    protected $with = ['category', 'author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    //Sąryšis su categorija, per category_i
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
