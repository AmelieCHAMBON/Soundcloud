@extends('layouts.app')

@section('content')
    
    {{$utilisateur->name}}
    <br/>

    @auth
        @if($utilisateur->id != \Illuminate\Support\Facades\Auth::id())
            @if(Auth::user()->jeLesSuit->contains($utilisateur->id))
                <a href="/suivi/{{$utilisateur->id}}">Arrêter de suivre</a>
            @else 
                <a href="/suivi/{{$utilisateur->id}}">Suivre</a>
            @endif
        @endif
    @endauth

Il suit {{$utilisateur->jeLesSuit->count()}} personnes
Il est suivi par {{$utilisateur->ilsMeSuivent->count()}} personnes

    @include("_chansons", ['chansons' => $utilisateur->chansons])
    

@endsection