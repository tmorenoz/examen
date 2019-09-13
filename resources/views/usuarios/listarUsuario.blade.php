@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-sm">Nuevo</a>   
    </div>
    <div class="modal fade bd-example-modal-sm" id="addusuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='addform' name="addform" method="post">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                           
                          {{--
                            <label for="">Razon Social</label>
                            <input type="text"  name="txt_razonsocial" class="form-control">
                            
                            --}} 
                        </div>
                        <div class="col-md-12">
                            <label for="">Apellido paterno</label>
                            <input type="text"  name="txt_apepaterno" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Apellido materno</label>
                            <input type="text"  name="txt_apematerno" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">dni</label>
                            <input type="text"  name="txt_dni" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Dirección</label>
                            <input type="text"  name="txt_direccion" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Telefono</label>
                            <input type="text"  name="txt_telefono" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Empresa</label>
                            <select name="slt_razonsocial" class="form-control">
                                    @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->razon_social}}</option>
                                    @endforeach
                            </select>    
                        </div>
                        <div class="col-md-12">
                            <label for="">foto</label>
                            <input type="text"  name="txt_foto"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Cargo</label>
                            <input type="text"  name="txt_cargo"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Ciudad</label>
                            <input type="text"  name="txt_ciudad"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Salario</label>
                            <input type="text" name="txt_salario" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">password</label>
                            <input type="text"  name="txt_password"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="text"  name="txt_email"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Categoria</label>
                            <br>
                            <select name="slt_categoria" class="form-control">
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre_cate}}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <div class="col-md-12">
                           {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="chk_estado" name="chk_estado">
                                <label class="form-check-label" for="chk-estado">
                                    Estado
                                </label>
                            </div>--}}
                        </div>
                        <br>
                        <a class="btn btn-primary addbtn">Guardar</a>
                    </div> 
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <br>
    </div>
    {{--comienzo modal edit--}}
    <div class="modal fade bd-example-modal-sm" id="editarusuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='editFormID' name="editFormID" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Apellido paterno</label>
                            <input type="text" id="txt_apepaterno" name="txt_apepaterno" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Apellido materno</label>
                            <input type="text" id="txt_apematerno" name="txt_apematerno" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">dni</label>
                            <input type="text" id="txt_dni" name="txt_ruc" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">direccion</label>
                            <input type="text" id="txt_direccion" name="txt_ruc" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Telefono</label>
                            <input type="text" id="txt_telefono" name="txt_telefono" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Empresa</label>
                            <select name="slt_razonsocial" class="form-control">
                                    @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->razon_social}}</option>
                                    @endforeach
                            </select>    
                        </div>
                        <div class="col-md-12">
                            <label for="">foto</label>
                            <input type="text" id="txt_foto" name="txt_foto" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">cargo</label>
                            <input type="text" id="txt_cargo" name="txt_cargo" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">salario</label>
                            <input type="text" id="txt_salario" name="txt_salario" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">password</label>
                            <input type="text" id="txt_password" name="txt_password" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">email</label>
                            <input type="text" id="txt_email" name="txt_email" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Categoria</label>
                            <br>
                            <select name="slt_categoria" class="form-control">
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre_cate}}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <div class="col-md-12">
                           {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="chk_estado" name="chk_estado">
                                <label class="form-check-label" for="chk-estado">
                                    Estado
                                </label>
                            </div>--}}
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div> 
                </form>
                </div>
            </div>
        </div>
    </div>
    {{--find modal edit--}}
    <div class="col-md-12">
        <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Razon Social</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>dni</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Categoria</th>
                    <th>Operación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->razon_social }}</td>
                    <td>{{ $usuario->ape_paterno }}</td>
                    <td>{{ $usuario->ape_materno }}</td>
                    <td>{{ $usuario->dni }}</td>
                    <td>{{ $usuario->ciudad }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>{{ $usuario->categoria_id }}</td>
                    <td>
                        <a href="#" class="btn btn-primary editusuariobtn">Edit</a>
                        <a href="#" class="btn btn-danger deleteusuariobtn" id="{{$usuario->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach          
            </tbody>
            <tfoot></tfoot>
        </table>
        {{ $usuarios->links() }} 
    </div>
</div>
@endsection
