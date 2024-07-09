<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = "artikel";

    protected $fillable = [
        'id_artikel',
        'judul_artikel',
        'img_artikel',
        'desc_artikel',
    
    ];

    protected $primaryKey = "id_artikel";
}
