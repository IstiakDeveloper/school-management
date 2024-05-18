<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function schoolClasses()
    {
        return $this->belongsToMany(SchoolClass::class);
    }
}
