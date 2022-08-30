<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function category()
    {
        // return $this->belongsTo(category::class, 'categories','category_id','id');   
        return $this->belongsTo(category::class, 'category_id');   
        // return $this->belongsTo(category::class,);   
    }

    public function country()
    {
        return $this->belongsTo(country::class, 'country_id');   
    }

    public function genre()
    {
        return $this->belongsTo(genre::class, 'genre_id');   
    }
}
