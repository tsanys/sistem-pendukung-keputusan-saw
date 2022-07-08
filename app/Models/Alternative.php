<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
