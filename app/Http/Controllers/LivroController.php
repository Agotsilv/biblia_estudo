<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $exists = Livro::where('nome', $request -> input('nome')) -> first();

        if($exists){
            return response()->json(['error' => 'Livro já existe'], 409);
        }else {
            if(Livro::create($request -> all())){
                return response() ->json([
                    "message" => 'Livro Cadastrado com sucesso',
                ], 200);
            };
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $exists = Livro::where('id', $id) -> first();



        if(!$exists){
            return response()->json(['error' => 'Livro não existe'], 404);
        }else {
        $livro =  Livro::find($id);

        $response = [
            'Livro' => $livro,
            'verisiculos' => $$livro->versiculos
        ];

        return $response;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $livro = Livro::findOrFail($id);

        if($livro -> update($request -> all())){
            return response() -> json([
                "message" => 'Livro Atualizado com sucesso',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $exists = Livro::where('id', $id) -> first();

        if(!$exists){
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }else {
            return Livro::destroy($id);
        }
    }
}
