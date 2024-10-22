<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeStroygrad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'block_id',
    ];
    public static $life_stroygrad_cards_routes = [
      'admin.life_stroygrad_cards.life_stroygrad_card_show',
      'admin.life_stroygrad_cards.life_stroygrad_card_edit',
      'admin.life_stroygrad_cards.life_stroygrad_card_create',
  ];
    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
