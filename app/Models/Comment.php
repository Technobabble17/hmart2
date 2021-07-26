<?php

namespace App\Models;

use App\Scopes\OwnedByUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Comment extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['comment'];
    protected static function booted()
    {
        // static::addGlobalScope(new OwnedByUser); //this messes up non logged in users viewing the image //middleware can solve
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
