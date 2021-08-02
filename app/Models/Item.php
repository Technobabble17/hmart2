<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Cknow\Money\Money;
use App\Scopes\OwnedByUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'description', 'status', 'price'];
    protected static function booted()
    {
        //static::addGlobalScope(new OwnedByUser);
    }
    public function scopeBrowse($query, ?int $user_id = null)
    {
        if($user_id)
        {
            $query->where('user_id', '!=', $user_id);
        }
        return $query;
    }

    public function scopeItems($query)
    {
        if(Auth::check())
        {
            $query->where('user_id', '=', Auth::id());
        }
        return $query;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class); //return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); //return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }

    public function messages()
    {
        return $this->hasMany(Message::class); //return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }

    public function getPriceAttribute()
    {
       return Money::USD($this->attributes['price']);
    }

    public function setPriceAttribute($price)
    {
        $nValue = is_numeric($price) ? '$' . $price : $price;
        $this->attributes['price'] = Money::parse($nValue, 'USD')->formatByDecimal()*100;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the data array...

        return ['title' => $array['title']];
    }
}
