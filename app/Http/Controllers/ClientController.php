<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Civilite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientRequest;
use Illuminate\Validation\Rule; 

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('civilite')->get()->toArray();
        return view('client.backoffice.index', compact('clients'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $civilites = Civilite::all()->toArray();
        if(Auth::user()){
            return view('client.backoffice.create', compact('civilites'));
        }
        else{
            return view('client.formulaire', compact('civilites'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $validatedData = $request->validated();
        $client=new Client ;
        $info="";
        try{
            $client->create($validatedData);
            $info="Vous vous êtes bien inscrit !";
        }
        catch(Exception $e){
            $info="Erreur lors de l'inscription";

        }
        
        return redirect()->route('client.create')->with('success', $info);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $civilites = Civilite::all()->toArray();
        $client = Client::find($id)->toArray();
        return view('client.backoffice.formulaire', compact('civilites', 'client'));
        
    }
        
    

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, string $id)
    {
       /* $validatedData = $request->validate(
            [
            'civilite_id' => 'required',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:clients,email,'. $id,
            'tel' => 'nullable|string',
        ]);*/

        
        $validatedData = $request->validated();
       
        $client=Client::find($id) ;

        $info="";
        
        try{
            $client->update($validatedData);
            $info="Vos modifications ont été prises en compte !";
            
        }
        catch(Exception $e){
            $info="Erreur lors de la modification";

        }
        
        return redirect()->route('client.edit',['id'=>$id])->with('success', $info);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //dd($client);
        $client=Client::find($id) ;
        $client->delete();
        //return view('client.backoffice.delete');
        return redirect()->route('client.index')->with('success', 'Client supprimé avec succès.');
    
    }
}
