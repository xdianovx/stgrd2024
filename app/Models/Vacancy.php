<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'expirience',
        'salary',
        'slug',
        'duties',
        'terms',
        'reqs',
        'city_id',
    ];

    public static $vacancies_routes = [
      'admin.vacancies.index',
      'admin.vacancies.search',
      'admin.vacancies.show',
      'admin.vacancies.edit',
      'admin.vacancies.create',
  ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
