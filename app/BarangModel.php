<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'stuff';
    //nama table yg digunakan

    protected $primarykey = 'kode_barang';
    // nama PK 
}