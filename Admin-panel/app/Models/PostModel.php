<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{

    protected $table="adminpost";
    protected $primaryKey="id";
    protected $fillable=[

        'title',
        'date',
        'description',
        'username',
        'status'=>'0'
        
      ];

    use HasFactory;
}
