<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
  use HasFactory;
  protected $fillable = [
  'type',
  'title',
  'text',
  'image',
  'project_block_id'
  ];
  public static $facilitie_routes = [
      'admin.projects.facilitie_show',
      'admin.projects.facilitie_edit',
      'admin.projects.facilitie_create',
  ];
  public function project_blocks()
  {
    return $this->belongsTo(Block::class);
  }
}
