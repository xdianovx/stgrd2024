<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanningSolution extends Model
{
    use HasFactory;
    protected $fillable = [
    'type',
    'square',
    'ipoteka',
    'price',
    'slug',
    'plan',
    'block_id'
    ];
    public static $planning_solution_routes = [
        'admin.planning_solutions.planning_solution_show',
        'admin.planning_solutions.planning_solution_edit',
        'admin.planning_solutions.planning_solution_create',
    ];
    public function block()
    {
        return $this->belongsTo(Block::class);

    }
}
