<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_product_model extends Model
{ use HasFactory;

    protected $table="table__products";
    protected $primarykey="id";
    
   
}
