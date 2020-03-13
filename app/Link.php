<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = "Link";
    
    protected $fillable = [
        'Label', 'Percent',
    ];
}
