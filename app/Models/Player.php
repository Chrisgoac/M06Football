<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    public $timestamps = false;  //turn off timestamps in migration.
 
    //fields fillable with mass create method.
    protected $fillable = ['name', 'surname', 'position', 'salary'];
 
    //relationship OneToMany between Item and Note
    public function team() {
        return $this->belongsTo(Team::class);        
    }
}
