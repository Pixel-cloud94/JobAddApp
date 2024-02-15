<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = ['name', 'address', 'email', 'phone'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}