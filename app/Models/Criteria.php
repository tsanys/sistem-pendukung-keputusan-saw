<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
