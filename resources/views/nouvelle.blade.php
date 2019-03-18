@extends('layouts.app')

@section('content')
    
    @include('_errors')
    
    <form class="imp" action="/creer" method='post' enctype='multipart/form-data' data-pjax>

        <input type="text" name="nom" placeholder="Nom de la chanson" value="{{old('nom')}}" required/>
        <input type="text" name="style" placeholder="Style de la chanson" value="{{old('style')}}" required/>
        <input type="file" name="chanson" required />
        {{csrf_field()}}
        <input type="submit" name="submit" />

    </form>

@endsection