<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMeta extends Model
{
    use HasFactory;
    protected $table = 'usersmeta';
    protected $fillable = ['uid', 'hoten', 'sdt', 'email', 'diachi', 'tinh', 'huyen'];
}
