<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table="admin";
    protected $primaryKey="id";
    protected $fillable=[

        'admin_name',
        'user_name',
        'password',
      ];




    use HasFactory;
}
