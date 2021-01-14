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
    protected $guarded = ['id'];
    
    function SosmedAccount(){
        return $this->hasMany('SocialMediaAccount');
    }
}
