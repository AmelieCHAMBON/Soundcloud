<?php

namespace App\Http\Controllers;

use App\Chanson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MonControleur extends Controller
{
    public function index() {
        return view("index", ['chansons' => Chanson::all()]);
    }
    
    public function nouvelle() {
        return view("nouvelle");
    }
    
    public function creer(Request $request) {
        
        /*$validatedData = $request->validate([
            'nom' => 'required|min:6'
        ]);*/
        $validator = Validator::make($request->all(),[
            'nom' => 'required|min:6'
        ]);
        if($validator->fails()){
            return redirect('/nouvelle')
                ->withErrors($validator)
                ->withInput()
                ->with('toastr',['statut' => 'error', 'message' => 'Ajout impossible']);
        }
            
        // Si formulaire validé au dessus
        if($request->hasFile('chanson') && $request->file('chanson')->isValid()) {
            $c = new Chanson();
            $c->nom = $request->input('nom');
            $c->style = $request->input('style');
            $c->utilisateur_id = Auth::id();
            
            $c->fichier = $request->file('chanson')->store("public/storage/chansons/".Auth::id());
            $c->fichier = str_replace("public/","/storage/", $c->fichier);
            $c->save();
            
            
        }
        return redirect("/")->with('toastr',['statut' => 'success', 'message' => 'Chanson ajoutée']);
    }
    
    public function utilisateur($id) {
        $utilisateur = User::find($id);
        if($utilisateur == false) {
            abort("404");
        }
        return view("utilisateur", ["utilisateur" => $utilisateur]);
    }
    
    public function deleteUser($id) {
        // Supprimer toutes les chansons d'un utilisateur
        
        // Supprimer un utilisateur

        $u=User::find($id);
        if($u){
            $u->delete($u);
            return redirect()->back();
        }
    }
    
    public function deleteChanson($id) {
        // Supprimer une chanson

        $c=Chanson::find($id);
        if($c){
            $c->delete($c);
            return redirect()->back();
        }
    }
    
    public function suivi($id) {
        $utilisateur = User::find($id);
        
        if($utilisateur == false){
            return redirect('/')->with('toastr',['statut' => 'error', 'message' => 'Problème de suivi']);
        }
        
        Auth::user()->jeLesSuit()->toggle($id);
        return back()->with('toastr',['statut' => 'success', 'message' => 'Suivi modifié']);
    }
    
    public function recherche($s) {
        $users = User::whereRaw("name LIKE CONCAT(?,'%')", [$s])->get();
        $chansons = Chanson::whereRaw("nom LIKE CONCAT(?,'%')", [$s])->get();
        return view("recherche", ['utilisateurs' => $users, 'chansons' => $chansons]);
    }
    
    public function testajax() {
        return redirect('/recherche/ut');
    }
}
