<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['size', 'breed'];
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
