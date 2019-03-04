@extends('layouts.app')

@section('content')
    @include('_audio')
    <a href="#" id="testajax">testons l'AJAX</a>
    <div id="aremplir">

    </div>

    @include("_chansons", ['chansons' => $chansons])

@endsection