<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $tables = 'products';
    protected $fillable = [
        'id',
        'name',
        'stock',
        'price'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
