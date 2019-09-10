<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokuLog extends Model
{
    protected $table = "doku_logs";

    protected $fillable = [
        'id', 'contents', 'created_at', 'updated_at'
    ];
}