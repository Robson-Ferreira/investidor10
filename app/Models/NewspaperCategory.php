<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewspaperCategory extends Model
{
    use HasFactory;

    protected $table = "newspaper_category";

    public function newspapers()
    {
        return $this->hasMany(Newspaper::class);
    }
}
