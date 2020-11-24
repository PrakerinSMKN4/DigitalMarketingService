<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'companies';
    protected $fillable = ['id_pemilik', 'nama_company', 'alamat', 'email','operational_time', 'operational_time_close', 'description', 'vision', 'mission'];
    
    function SosmedAccount(){
        return $this->hasMany('SocialMediaAccount');
    }
}
