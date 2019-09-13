<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Empresa;
use App\Categoria;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hola');
        $usuarios=Usuario::ListaUsuarios()->paginate(5);
        $empresas=Empresa::all();
        $categorias=Categoria::all();
        return view('usuarios.listarUsuario',compact('usuarios','empresas','categorias'));
    }
    public function store(Request $request)
    {
        //dd($request->txt_apepaterno);
                     $usuario = new Usuario;

                     $usuario->ape_paterno = $request->txt_apepaterno;
                     $usuario->ape_materno = $request->txt_apematerno;
                     $usuario->dni = $request->txt_dni;
                     $usuario->direccion = $request->txt_direccion;
                     $usuario->telefono = $request->txt_telefono;
                     $usuario->empresa_id = $request->slt_razonsocial;
                     $usuario->foto = $request->txt_foto;
                     $usuario->cargo = $request->txt_cargo;
                     $usuario->salario = $request->txt_salario;
                     $usuario->password = $request->txt_password;
                     $usuario->email = $request->txt_email;
                     $usuario->categoria_id = $request->slt_categoria;

                     $usuario->save();
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

  
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        $usuario->ape_paterno = $request->input('txt_apeparteno');
        $usuario->ape_materno = $request->input('txt_apematerno');
        $usuario->dni = $request->input('txt_dni');
        $usuario->direccion = $request->input('txt_direccion');
        $usuario->telefono = $request->input('txt_telefono');
        $usuario->empresa_id = $request->input('slt_empresa');
        $usuario->foto = $request->input('txt_foto');
        $usuario->cargo = $request->input('txt_cargo');
        $usuario->salario = $request->input('txt_salario');
        $usuario->password = $request->input('txt_password');
        $usuario->email = $request->input('txt_email');
        $usuario->categoria_id = $request->input('slt_categoria');

        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id)->delete();

        return json_encode($usuario);//
    }
}
