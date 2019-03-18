@extends('layouts.app')

@section('content')
    @include('_audio')
    
    {{$utilisateur->name}}
    <br/>

    @auth

        @if($utilisateur->id != \Illuminate\Support\Facades\Auth::id())

            @if(Auth::user()->jeLesSuit->contains($utilisateur->id))
                <a href="/suivi/{{$utilisateur->id}}" data-pjax-toggle>Arrêter de suivre</a>
            @else 
                <a href="/suivi/{{$utilisateur->id}}" data-pjax-toggle>Suivre</a>
            @endif

        @else
            <a href="/delete/user/{{$utilisateur->id}}" data-pjax-toggle>Supprimer mon compte</a>
        @endif

    @endauth

Il suit {{$utilisateur->jeLesSuit->count()}} personnes
Il est suivi par {{$utilisateur->ilsMeSuivent->count()}} personnes

    @include("_chansons", ['chansons' => $utilisateur->chansons])
    

@endsection