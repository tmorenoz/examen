<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas=Empresa::paginate(10);
        return view('empresa.listarEmpresa',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

             $empresa = new Empresa;
    
             $empresa->razon_social = $request->txt_razonsocial;
             $empresa->nombre_comercial = $request->txt_nombrecomercial;
             $empresa->ruc = $request->txt_ruc;
             $empresa->ciudad = $request->txt_ciudad;
             $empresa->telefono = $request->txt_telefono;
             $empresa->categoria_id = $request->slt_categoria;

             $empresa->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresas = Empresa::find($id);

        $empresas->razon_social=$request->input('txt_razonsocial');
        $empresas->nombre_comercial=$request->input('txt_nombrecomercial');
        $empresas->ruc=$request->input('txt_ruc');
        $empresas->ciudad=$request->input('txt_ciudad');
        $empresas->telefono=$request->input('txt_telefono');
        $empresas->categoria_id=$request->input('slt_categoria');

        $empresas->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $empresa = Empresa::find($id)->delete();

        return json_encode($empresa);
    }
}
