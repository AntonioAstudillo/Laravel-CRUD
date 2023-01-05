@extends('layouts.app')

@section('content')
<div class="container">
   <form class="" action="{{ route('update' , $producto->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="card p-2">
         <h1 class="text-center">Información del producto</h1>
            <div class="row mt-3 d-flex justify-content-center">
               <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Titulo del producto</label>
                  <input class="form-control form-control" name="title" type="text" value="{{ $producto->title }}">
               </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
               <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Descripción del producto</label>
                  <input class="form-control form-control" type="text" name="description" value="{{ $producto->description }}">
               </div>
            </div>

            <div class="row d-flex justify-content-center mt-3">
               <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Precio del producto</label>
                  <input class="form-control form-control" type="text" name="price" value="{{ $producto->price }}">
               </div>
            </div>

            <div class="row d-flex justify-content-center mt-3">
               <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Stock</label>
                  <input class="form-control form-control" type="text" name="stock" value="{{ $producto->stock }}">
               </div>
            </div>


            <div class="row d-flex justify-content-center mt-3">
               <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Estado del producto</label>
                  <input class="form-control form-control" type="text" name="status" value="{{ $producto->status }}">
               </div>
            </div>

            <div class="row d-flex justify-content-center mt-3">
               <div class="col-6 text-center">
                  <input type="submit" name="" value="Actualizar información" class="btn btn-primary">
               </div>
            </div>
      </div>
   </form>

</div>
@endsection
