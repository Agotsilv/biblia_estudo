<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $exists = Versiculo::where('versiculo', $request -> input('versiculo')) -> first();

        if($exists){
            return response()->json([
               'message' => 'Já existe um versículo com este nome.'
            ], 409);
        }else {
            if(Versiculo::create($request -> all())){
                return response() -> json([
                    'message' => 'Versiculo cadastrado com sucesso!'
                ], 200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($versiculo){
        return Versiculo::findOrFail($versiculo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versiculo){
        $versiculo = Versiculo::findOrFail($versiculo);

        if($versiculo -> update($request -> all())){
            return response() -> json([
               'message' => 'Versiculo atualizado com sucesso!'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * $exists = Versiculo::where('versiculo', $request -> input('versiculo')) -> first();
     */
    public function destroy($versiculo){
        if(Versiculo::findOrFail($versiculo)){
            if(Versiculo::destroy($versiculo)){
                return response() -> json([
                   'message' => 'Versiculo excluído com sucesso!'
                ], 200);
            }
        }


    }
}
