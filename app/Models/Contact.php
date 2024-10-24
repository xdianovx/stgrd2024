<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'office_type',
        'address',
        'phone',
        'longitude',
        'latitude',
        'city_id',
    ];
    public static $contact_routes = [
      'admin.contacts.index',
      'admin.contacts.search',
      'admin.contacts.show',
      'admin.contacts.edit',
      'admin.contacts.create',
  ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
