<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Badge extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['level', 'points'];
    protected $hidden = ['created_at', 'updated_at', 'creator_type', 'editor_type'];
}
