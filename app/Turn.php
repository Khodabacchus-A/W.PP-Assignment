<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    //turn off auto incrementing for model class
    public $incrementing = false;
   //let laravel know which columns are editable
    public $fillable = ['player_id', 'location', 'type', 'game_id', 'id'];
    
    public function game(){
        
        //game_id is our foreign key
        $this->belongsTo(Game::class, 'game_id');
    }
}
