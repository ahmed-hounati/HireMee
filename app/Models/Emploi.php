<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    protected $fillable = [
        "name",
        "title",
        "description",
        "user_id",
        "competences",
        "contract",
        "emplacement",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function applications()
    {
        return $this->hasMany(Candidature::class, 'emploi_id', 'id');
    }
}
