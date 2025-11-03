<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
