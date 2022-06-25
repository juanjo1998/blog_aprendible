<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name; 
        $this->attributes['slug'] = Str::slug($name); 
    }

    function getRouteKeyName(){
        return 'slug';
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
