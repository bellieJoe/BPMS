<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Butterfly;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function butterfly(){
        return $this->hasOne(Butterfly::class, 'id', 'butterfly_id');
    }

    protected $dates = [
        'date_of_transport', 'created_at', 'updated_at'
    ];
}
