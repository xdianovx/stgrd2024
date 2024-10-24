<?php

namespace App\Models;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = ['title','title_left','slug','active','text_large','description','description_additional'];
    public static $blocks_routes = [
        'admin.blocks.index',
        'admin.blocks.search',
        'admin.blocks.show',
        'admin.blocks.edit',
        'admin.blocks.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function numbers()
    {
      return $this->hasMany(Number::class);
    }
    public function advantages()
    {
      return $this->hasMany(Advantage::class);
    }

    public function companies()
    {
      return $this->hasMany(Company::class);
    }
    public function life_stroygrad_cards()
    {
      return $this->hasMany(LifeStroygrad::class);
    }
    public function reviews()
    {
      return $this->hasMany(Review::class);
    }
}
