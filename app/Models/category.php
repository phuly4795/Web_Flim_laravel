<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    public function movie()
    {
        return $this->hasMany(movie::class)->orderBy('id','DESC');   
    }
}
