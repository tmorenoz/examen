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
                <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='addform' name="addform" method="post">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">NOmbre</label>
                            <input type="text"  name="txt_razonsocial" class="form-control">
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
    <div class="modal fade bd-example-modal-sm" id="editarcategoria" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                            <label for="">Nombre</label>
                            <input type="text" id="txt_razonsocial" name="txt_razonsocial" class="form-control">
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
                    <th>nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->razon_social }}</td>
                    <td>
                        <a href="#" class="btn btn-primary editbtn">Edit</a>
                        <a href="#" class="btn btn-danger deletebtn" id="{{$categoria->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach          
            </tbody>
            <tfoot></tfoot>
        </table>
        {{ $categorias->links() }} 
    </div>
</div>
@endsection