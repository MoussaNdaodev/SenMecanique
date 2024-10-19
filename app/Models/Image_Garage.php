<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_Garage extends Model
{
    use HasFactory;
    protected $fillable = [
        "url",
    ];

    public function garage(){
        return $this->belongsTo(Garage::class);
    }
}
