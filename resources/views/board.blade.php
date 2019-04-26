@extends('layouts.app')

@section('scripts')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-info">
                <div class="profile-username">
                    {{ $user->id == $nextTurn->player_id ? "You are next!" : "Waiting on Player 2!"}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tic-tac-toe">
                @foreach($locations as $index=>$location)
                <input type="radio"
                       class="player-{{ $location["checked"] ? $location["type"] : $playerType}} {{ $location["class"]}}"
                       id="block-{{$index}}"
                       value="{{ $index }}"
                       {{ $location["checked"] ? "checked" : ""}}
                       {{ $user->id != $nextTurn->player_id ? "disabled" : ""}}/>
                <label for="block-{{$index}}"></label>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

