@extends('layouts.app')

@section('content')
    <a href="#" id="testajax">testons l'AJAX</a>
    <div id="aremplir">

    </div>

    @include("_chansons", ['chansons' => $chansons])

@endsection