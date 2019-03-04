<ul>
        @foreach($chansons as $c)
        <li><a class="chanson" data-file='{{$c->fichier}}' href="#">{{$c->nom}}</a> par l'utilisateur {{$c->utilisateur->name}}</li>
        @endforeach
    </ul>