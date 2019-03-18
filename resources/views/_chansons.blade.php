<div id="groupeChansons">
<ul class="grid-chansons">
        @foreach($chansons as $c)
    <li><a class="chanson" data-file='{{$c->fichier}}' href="#">{{$c->nom}}</a> par l'utilisateur <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a>
        @if($c->utilisateur->id == \Illuminate\Support\Facades\Auth::id())
            <a href="/delete/chanson/{{$c->utilisateur->id}}" data-pjax-toggle>Supprimer ma chanson</a>
        @endif
    
    </li>
        @endforeach
    </ul>
</div>