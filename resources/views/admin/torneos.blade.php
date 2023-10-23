@extends('admin.layouts.main')
@section('container')
<h1>Torneos</h1>
<form action="/dash/torneos" method="post" enctype="multipart/form-data">
    @csrf
    @if($message=Session::get('errorinsert'))
    <div class="alert alert-danger alert-dismissable fade show" role="alert">
        <h5>Error</h5>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($message=Session::get('Listo'))
   <div class="content">
    <div class="container-fluid" role="alert">
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            <h5>Listo</h5>
            <p>Todo bien</p>
        </div>
    </div>
    </div>
    @endif
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre del torneo" name="nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Ciudad</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Ciudad donde se realiza el torneo" name="ciudad">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Descripcion</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Descripcion" name="desc">
    </div>
    <div class="input-group mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" name="imagen">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
    </div>
  </div>
 
   
  </div>
  <div class="form-group">
   
  </div>
  <button type="submit" class="btn btn-primary">Subir</button>
</form>

 <!-- Modal Delete -->
 <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body">
                <h5>¿Deseas eliminar el registro?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
            </div>
        

            </div>
        </div>
    </div>

<table class="table">
<thead>
<tr>
        
        <th>Nombre</th>
        <th>Ciudad</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th></th>

    </tr>
</thead>
<tbody>
    @foreach($torneos as $t)
    <tr>
        <td>{{$t->nombre}}</td>
        <td>{{$t->ciudad}}</td>
        <td>{{$t->descripcion}}</td>
        <td><img src="{{asset('img/torneos/'.$t->imagen)}}" alt="" width="70px"></td>
        <td>
            <button class="btn btn-danger btnEliminar" data-id="{{$t->id}}"><i class="fa fa-trash"
            data-toggle="modal" data-target="modal-delete"></i></button>
        </td>
    </tr>
    @endforeach
</tbody>
    
</table>

@endsection('container')
@section('scripts')
<script>
    window.onload =()=>{
        var idEliminar = 0
        let buttons =document.getElementsByClassName("btnEliminar");
        console.log(buttons)
        for(var x=0;x<buttons.length;x++){
            buttons[x].addEventListener('click', (evt)=>{
                //evt.stopPropagation();
                idEliminar = evt.target.dataset.id
                alert(idEliminar)
            })
        }}
        document.querySelector("#btnEliminar").addEventListener('click',()=>{
            //alert("Vas a eliminar "+idEliminar)
            document.querySelector("#formEliminar_"+idEliminar).requestSubmit()

        })
        </script>
@endsection
