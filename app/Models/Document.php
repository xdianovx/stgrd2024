<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
  use HasFactory;
  protected $fillable = [
  'title',
  'file',
  'project_block_id'
  ];
  public static $document_routes = [
      'admin.projects.document_show',
      'admin.projects.document_edit',
      'admin.projects.document_create',
  ];
  public function project_blocks()
  {
    return $this->belongsTo(Block::class);
  }
  public function getFileSize()
  {
      return Storage::size($this->file);
  }
}
