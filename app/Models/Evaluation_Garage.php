<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_Garage extends Model
{
    use HasFactory;

    protected $fillable = [
        "commentaire_evaluation",
        "note_evaluation",
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
