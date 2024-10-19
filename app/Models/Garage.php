<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Garage extends Model
{
    use HasFactory;
    protected $fillable = [
        "logo",
        "description",
        "jour_travail",
        "type_garage",
        "telephone_garage",
        "nombre_mecanicien",
        "service_garage",
    ];

    public  function image_garage()  {
        return $this->hasMany(Image_Garage::class);
    }
    public function localisation(){
        return $this->belongsTo(Localisation::class);
    }
    public function User() {
        return $this->BelongsTo(User::class);
    }

    public function evaluation_garage(){
        return $this->hasMany(Evaluation_Garage::class);
    }
    public function demande_assistance(){
        return $this->hasMany(Demande_Assistance::class);
    }
}
