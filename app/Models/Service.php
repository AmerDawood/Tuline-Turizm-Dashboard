<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }


    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    // public function getIsFavoriteAttribute()
    // {
    //     $user = auth()->user();
    //     return $user->favorites->contains('id', $this->id);
    // }

}
