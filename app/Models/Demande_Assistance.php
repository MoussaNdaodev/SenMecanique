<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande_Assistance extends Model
{
    use HasFactory;
    protected $fillable = [
        "description_probleme",
        "status",
        "type_service",
        "user_id",
        "garage_id",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function garage()  {
        return $this->belongsTo(Garage::class);
    }
}
