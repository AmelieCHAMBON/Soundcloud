@extends('layouts.app')

@section('content')
    
    <form class="imp" action="/creer" method='post' enctype='multipart/form-data'>

        <input type="text" name="nom" placeholder="Nom de la chanson" required/>
        <input type="text" name="style" placeholder="Style de la chanson" required/>
        <input type="file" name="chanson" required />
        {{csrf_field()}}
        <input type="submit" name="submit" />

    </form>

@endsection