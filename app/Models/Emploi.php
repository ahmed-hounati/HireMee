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
}
