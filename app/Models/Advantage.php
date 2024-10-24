<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    protected $fillable = ['title','num','description','image'];
    public static $advantages_routes = [
        'admin.blocks.advantage_show',
        'admin.blocks.advantage_edit',
        'admin.blocks.advantage_create',
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);

    }
}
