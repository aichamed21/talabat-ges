<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * An order might have many product which are saved seperately in this table,
 */
class OrderProduct extends Model
{
    use HasFactory;
}
