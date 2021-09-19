<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $appends = [
        'photo_url',
    ];
    
    public function getPhotoUrlAttribute()
    {
        if ($this->image != "default.png") {
            return '/images/'.$this->image;
        }
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=FFFFFF&background=2563EB';
    }
}
