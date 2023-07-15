<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "imgPath",
        "artist",
        "language_id"
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

}
