<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turn;

class GameController extends Controller
{
    public function board(Request $request, $id){
        $user = $request->user();
        
        $players = Turn::where('game_id', '=', $id)->select('player_id', 'type')->distinct()->get();
        $playerType = $user->id == $players[0]->player_id ? $players[0]->type : $players[1]->type;
        $otherUserId = $user->id == $players[0]->player_id ? $players[1]->type : $players[0]->type;
        
        $pastTurns = Turn::where('game_id', '=', $id)->whereNotNull('location')->orderBy('id')->get();
        $nextTurn = Turn::where('game_id', '=', $id)->whereNull('location')->orderBy('id')->first();
        
        $locations = [
            1 => [
                "class" => 'top left',
                "checked" => false,
                "type" => ""
          ], 
            2 => [
                "class" => 'top middle',
                "checked" => false,
                "type" => ""
          ],  
            3 => [
                "class" => 'top right',
                "checked" => false,
                "type" => ""
          ],        
            4 => [
              "class" => 'center left',
              "checked" => false,
              "type" => ""
          ],  
            5 => [
              "class" => 'center middle',
              "checked" => false,
              "type" => ""
          ],  
            6 => [
              "class" => 'center right',
              "checked" => false,
              "type" => ""
          ],  
            7 => [
              "class" => 'bottom left',
              "checked" => false,
              "type" => ""
          ],  
            8 => [
              "class" => 'bottom middle',
              "checked" => false,
              "type" => ""
          ],  
            9 => [
              "class" => 'bottom right',
              "checked" => false,
              "type" => ""
          ]
        ];
        
        foreach($pastTurns as $pastTurn){
            $locations[$pastTurn->location]["checked"]=true;
            $locations[$pastTurn->location]["type"]=$pastTurn->type;
        }
        
        return view('board', compact('user', 'id','nextTurn','locations','playerType','otherPlayerId'));
    }
}
