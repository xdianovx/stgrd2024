<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $fillable = ['title','num','num_text'];
    public static $nums_routes = [
        'admin.blocks.number_search',
        'admin.blocks.number_show',
        'admin.blocks.number_edit',
        'admin.blocks.number_create',
    ];
    public function block()
    {
        return $this->belongsTo(Block::class);

    }
}
