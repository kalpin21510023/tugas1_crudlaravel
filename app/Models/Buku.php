<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primarykey = 'id';
    public $timestamps = false;
    public $fillable = [
        'judul','jenis','pengarang'
    ];    
}

