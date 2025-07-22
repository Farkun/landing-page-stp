<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionStep extends Model
{
    use HasFactory;
    protected $table = 'selection_step';
    protected $guarded = [];

    public $timestamps = false;
}
