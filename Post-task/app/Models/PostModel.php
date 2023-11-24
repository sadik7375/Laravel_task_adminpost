<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{

    protected $table="adminposts";
    protected $primaryKey="id";
    protected $fillable=[

        'title',
        'username',
        'date',
        'description',
        'status'
      
        
        
      ];

    use HasFactory;
}
