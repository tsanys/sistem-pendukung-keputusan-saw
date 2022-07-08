<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }

    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
