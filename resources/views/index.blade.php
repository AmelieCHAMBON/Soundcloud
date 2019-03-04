@extends('layouts.app')

@section('content')
    A vous de travailler maintenant :)

    @include("_chansons", ['chansons' => $chansons])

@endsection