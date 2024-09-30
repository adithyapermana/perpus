<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaProjek extends Model
{
    use HasFactory;
    protected $table = 'cobas';
    public $fillable = ['kode_barang', 'nama','stok'];
}