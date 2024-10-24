<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'position',
        'photo',
        'video',
        'block_id'
    ];

    public static $reviews_routes = [
      'admin.blocks.review_show',
      'admin.blocks.review_edit',
      'admin.blocks.review_create',
  ];

    public function block()
    {
        return $this->belongsTo(Block::class);

    }
}
