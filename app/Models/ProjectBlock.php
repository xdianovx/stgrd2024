<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBlock extends Model
{
  use HasFactory;
  protected $fillable = ['title_left','slug','active','text_large','description','description_additional'];
  public static $project_blocks_routes = [
      'admin.projects.project_block_show',
      'admin.projects.project_block_edit',
  ];
  public function getRouteKeyName()
  {
      return 'slug';
  }
  public function planning_solutions()
  {
    return $this->hasMany(PlanningSolution::class);
  }
  public function facilities()
  {
    return $this->hasMany(Facilitie::class);
  }
  public function map_points()
  {
    return $this->hasMany(MapPoint::class);
  }
  public function project_images()
  {
    return $this->hasMany(ProjectImage::class);
  }
  public function construction_stages()
  {
    return $this->hasMany(ConstructionStage::class);
  }
  public function documents()
  {
    return $this->hasMany(Document::class);
  }
  public function project()
  {
      return $this->belongsTo(Project::class);
  }
}
