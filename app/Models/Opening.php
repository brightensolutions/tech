<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    use HasFactory;
    protected $fillable = ['job_title','location','description']; // Add all the attributes you want to fill
    protected $table = 'openings';
}
