<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * History is used for various messaging and notes on the application side,
 * Example: When an admin makes a payout or deposit he might like to take a note for future.
 */
class History extends Model
{
    use HasFactory;
}
