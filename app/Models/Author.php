<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'country',
    ];

    use HasFactory;

    public function getFullNameAttribute(): string
    {
        return sprintf('%s %s (%s)', $this->name, $this->surname, $this->country);
    }
}
