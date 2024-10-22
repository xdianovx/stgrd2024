<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'sphere_activity',
        'site_url',
        'year',
        'address',
        'phone',
        'email',
        'block_id',
    ];
    public static $company_routes = [
      'admin.companies.company_show',
      'admin.companies.company_edit',
      'admin.companies.company_create',
  ];
  public function block()
  {
      return $this->belongsTo(Block::class);

  }
}
