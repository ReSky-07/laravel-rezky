<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',     // Kolom untuk nama
        'email',    // Kolom untuk email
        'message',  // Kolom untuk pesan
    ];
}
