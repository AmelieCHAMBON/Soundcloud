<ul>
        @foreach($chansons as $c)
    <li><a class="chanson" data-file='{{$c->fichier}}' href="#">{{$c->nom}}</a> par l'utilisateur <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a></li>
        @endforeach
    </ul>