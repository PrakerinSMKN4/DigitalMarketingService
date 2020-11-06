<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ItemPage extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = 'item_pages';
    protected $fillable =  [ 'id_pages', 'judul', 'keterangan', 'multimedia'];
}
