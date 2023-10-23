<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Torneo;
class TorneosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos=\DB::table('torneos')
        ->select('torneos.*')
        ->orderBy('id','DESC')
        ->get();

        return view('admin.torneos')
        ->with('torneos',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'nombre'=>'required',
            'ciudad'=>'required',
            'desc'=>'required',
            'imagen'=>'required'
        ]);
        if($validator->fails()){
            return back()
            ->with('errorinsert','Favor de llenar los campos')
            ->withErrors('Favor de llenar los campos');
        }
            else{
               $imagen =$request->file('imagen');
               $nombre = time().'.'.$imagen->getClientOriginalExtension();
              $destino=public_path('img/torneos');
             $request->imagen->move($destino,$nombre);
             $torneo=Torneo::create([
                'nombre'=>$request->nombre,
                'ciudad'=>$request->ciudad,
                'descripcion'=>$request->desc,
                'imagen'=>$nombre
            ]); 
            $torneo->save();
            return back()->with('Listo', 'Se ha insertado correctamente');
            }
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
