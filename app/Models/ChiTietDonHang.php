<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $fillable = ['id_sanpham', 'soluong', 'id_donhang', 'giasanpham'];
}
