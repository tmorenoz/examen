@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-sm">Nuevo</a>   
    </div>
    <div class="modal fade bd-example-modal-sm" id="registrarempresa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='addform' name="addform" method="post">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Razon Social</label>
                            <input type="text"  name="txt_razonsocial" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Nombre Comercial</label>
                            <input type="text"  name="txt_nombrecomercial" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">ruc</label>
                            <input type="text"  name="txt_ruc" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Ciudad</label>
                            <input type="text"  name="txt_ciudad"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Telefono</label>
                            <input type="text" name="txt_telefono" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Categoria</label>
                            <br>
                            <select name="slt_categoria" >
                                <option value="1">1</option>
                            </select>
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
                        <a class="btn btn-primary" onclick="guardar()">Guardar</a>
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
    <div class="modal fade bd-example-modal-sm" id="editarempresa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar empresa</h5>
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
                            <label for="">Razon Social</label>
                            <input type="text" id="txt_razonsocial" name="txt_razonsocial" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Nombre Comercial</label>
                            <input type="text" id="txt_nombrecomercial" name="txt_nombrecomercial" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">ruc</label>
                            <input type="text" id="txt_ruc" name="txt_ruc" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Ciudad</label>
                            <input type="text" id="txt_ciudad" name="txt_ciudad"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Telefono</label>
                            <input type="text" id="txt_telefono" name="txt_telefono" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Categoria</label>
                            <br>
                            <select name="slt_categoria" id="slt_categoria">
                                <option value="1">1</option>
                            </select>
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
        <table id="empresas" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Razon Social</th>
                    <th>Nombre comercial</th>
                    <th>Ruc</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Categoria</th>
                    <th>Operación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td>{{ $empresa->razon_social }}</td>
                    <td>{{ $empresa->nombre_comercial }}</td>
                    <td>{{ $empresa->ruc }}</td>
                    <td>{{ $empresa->ciudad }}</td>
                    <td>{{ $empresa->telefono }}</td>
                    <td>{{ $empresa->categoria_id }}</td>
                    <td>
                        <a href="#" class="btn btn-primary editbtn">Edit</a>
                        <a href="#" class="btn btn-danger deletebtn" id="{{$empresa->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach          
            </tbody>
            <tfoot></tfoot>
        </table>
        {{ $empresas->links() }} 
    </div>
</div>
@endsection
