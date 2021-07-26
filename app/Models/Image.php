<?php

namespace App\Models;

use App\Scopes\OwnedByUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Image extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'description', 'path', 'item_id'];
    protected static function booted()
    {
        // static::addGlobalScope(new OwnedByUser); //this messes up non logged in users viewing the image //middleware can solve
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->path); //the model should know how to find its own information (url in this case) this is important for refactoring code
    }
}
