<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;  

    /* ejemplo de accesor */

   /*  public function getExcerptAttribute($excerpt)
    {
        return Str::slug($excerpt).'Hello Friend';
    } */

    /* ejemplo de mutador (modifica la propiedad, cuando se guarda en la db (save())) */
    /* este metodo se ejcutará antes de guardar o actualizar el modelo */

   /*  public function setExcerptAttribute($excerpt)
    {
        $this->attributes['excerpt'] = Str::slug($excerpt);
    } */

    //Le indicamos que el campo published_at es una instancia de Carbon

    protected $dates = ['published_at'];

    /* massAssignment */

    protected $guarded = [];

    /* urls amigables */

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* query scopes */

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
                ->where('published_at','<=',Carbon::now())
                ->orderBy('id','desc');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
