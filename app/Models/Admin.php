<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_maskapai',
        'dari',
        'ke',
        'harga',
        'kuota_kursi',
        'image_path'
    ];

    protected $table = 'flights';
}
