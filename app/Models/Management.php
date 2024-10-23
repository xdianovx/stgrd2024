<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'position',
        'image',
        'phone',
        'email',
    ];
    public static $managements_routes = [
      'admin.managements.index',
      'admin.managements.show',
      'admin.managements.edit',
      'admin.managements.create',
  ];
}
