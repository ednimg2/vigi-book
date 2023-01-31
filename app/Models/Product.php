<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory, HasUuids;

    //const CREATED_AT = 'created_date';

    //protected $table = 'product';
    //public $incrementing = false;
    //protected $keyType = 'string'; //jj34hhf8d324h-23424hj23-3423bn
    protected $primaryKey = 'category_id';
    protected $keyType = 'string';
    //public $timestamps = false;
    protected $connection = 'sqlite';
}
