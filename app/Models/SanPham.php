<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = ['masanpham', 'ten', 'quycach', 'gia', 'soluong', 'id_loai', 'trangthai', 'mota', 'hinhanh']  ;
}
