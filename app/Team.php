<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function notice() {
        return $this->hasMany(Notice::class);
    }
    public function user() {
        return $this->hasMany(User::class);
    }
}
