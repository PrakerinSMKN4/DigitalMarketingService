<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MenuPage extends Model
{
    use HasFactory, Notifiable;
 
    protected $table = 'menu_pages';
    protected $fillable =  ['id_company', 'keterangan','jenis_halaman', 'multimedia'];
}
