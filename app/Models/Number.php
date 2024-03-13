<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $fillable = ['title','num','num_text'];
    public static $nums_routes = [
        'admin.nums.search',
        'admin.nums.show',
        'admin.nums.edit',
        'admin.nums.create',
    ];
    public function block()
    {
        return $this->belongsTo(Block::class);

    }
}
