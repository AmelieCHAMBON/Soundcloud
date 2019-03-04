<?php

namespace App\Http\Controllers;

use App\Chanson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonControleur extends Controller
{
    public function index() {
        return view("index", ['chansons' => Chanson::all()]);
    }
    
    public function nouvelle() {
        return view("nouvelle");
    }
    
    public function creer(Request $request) {
        if($request->hasFile('chanson') && $request->file('chanson')->isValid()) {
            $c = new Chanson();
            $c->nom = $request->input('nom');
            $c->style = $request->input('style');
            $c->utilisateur_id = Auth::id();
            
            $c->fichier = $request->file('chanson')->store("public/storage/chansons/".Auth::id());
            $c->fichier = str_replace("public/","/storage/", $c->fichier);
            $c->save();
            
            
        }
        return redirect("/");
    }
    
    public function utilisateur($id) {
        $utilisateur = User::find($id);
        if($utilisateur == false) {
            abort("404");
        }
        return view("utilisateur", ["utilisateur" => $utilisateur]);
    }
    
    public function suivi($id) {
        $utilisateur = User::find($id);
        if($utilisateur == false)
            abort("403");
        Auth::user()->jeLesSuit()->toggle($id);
        return back();
    }
    
    public function recherche($s) {
        $users = User::whereRaw("name LIKE CONCAT(?,'%')", [$s])->get();
        $chansons = Chanson::whereRaw("nom LIKE CONCAT(?,'%')", [$s])->get();
        return view("recherche", ['utilisateurs' => $users, 'chansons' => $chansons]);
    }
}
