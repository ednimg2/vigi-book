<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    //Sąryšis su categorija, per category_i
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
