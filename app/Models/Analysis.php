<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use SoftDeletes;

    protected $table = "analysis";

    protected $fillable = ['name','status'];

    protected $guarded = [];
}
