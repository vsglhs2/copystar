<?php

namespace App\Models;

use App\Models\Traits\Filtrable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filtrable;
    use HasFactory;

    protected $guarded = false;
    protected $table = 'products';
}
