<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // allow mass assignment
    protected $fillable = ["tree_part_id", "content"];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function tree_parts()
    {
        return $this->belongsTo(TreePart::class)->withDefault();
    }
}
