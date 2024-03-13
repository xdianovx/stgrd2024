<?php

namespace App\Models;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = ['title_left','text_large','description','description_additional'];
    public static $blocks_routes = [
        'admin.blocks.index',
        'admin.blocks.search',
        'admin.blocks.show',
        'admin.blocks.edit',
        'admin.blocks.create',
    ];

    public function numbers()
    {
      return $this->hasMany(Number::class);
    }
    public function advantages()
    {
      return $this->hasMany(Advantage::class);
    }
}
