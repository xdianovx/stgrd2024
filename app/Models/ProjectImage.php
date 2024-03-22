<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
  use HasFactory;
  protected $fillable = [
  'text',
  'image',
  'project_block_id'
  ];
  public static $project_image_routes = [
      'admin.projects.project_image_routes_show',
      'admin.projects.project_image_routes_edit',
      'admin.projects.project_image_routes_create',
  ];
  public function project_blocks()
  {
    return $this->belongsTo(Block::class);
  }
}
