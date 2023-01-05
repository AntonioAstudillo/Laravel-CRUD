@extends('layouts.app')

@section('content')



   @if(session('mensaje'))
      <div class="container">
         <div class="alert {{session('clase')}}" role="alert">
           <p>{{ session('mensaje') }}</p>
         </div>
      </div>
   @endif

<div class="container">
   <table class="table table-striped table-hover">
      <thead class="text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Stock</th>
          <th scope="col">Status</th>
          <th >Opciones</th>
        </tr>
      </thead>
      <tbody class="text-center">
         @foreach ($productos as $producto)
            <tr>
             <th scope="row">{{$producto->id}}</th>
             <td>{{$producto->title}}</td>
             <td>{{$producto->description}}</td>
             <td>{{$producto->price}}</td>
             <td>{{$producto->stock}}</td>
             <td>{{$producto->status}}</td>
             <th>
                 <a href="{{ route('edit', $producto->id ) }}" class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>

                 <form class="d-inline" action="{{ route('delete' , $producto->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button  class="btn btn-danger"  type="submit" name="button"><i class="fa-solid fa-trash"></i></button>
                 </form>
             </th>
            </tr>
         @endforeach
      </tbody>
   </table>

   <div class="d-flex justify-content-center">
      {!! $productos->links() !!}
   </div>

</div>

@endsection




@section('modal')
   <div class="container mb-3">
      <!-- Button trigger modal -->
      <button id="btnAddProduct" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i>
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Datos del producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="" action="{{ route('create') }}" method="post">
                 @csrf
                 <div class="row mt-3">
                    <div class="col-12">
                       <input class="form-control" type="text" name="titleProduct"  placeholder="Ingresa titulo del producto">
                    </div>
                 </div>
                 <div class="row mt-3">
                    <div class="col-12">
                       <input class="form-control" type="text" name="priceProduct"  placeholder="Ingresa el precio del producto">
                    </div>
                 </div>
                 <div class="row mt-3">
                    <div class="col-12">
                       <input class="form-control" type="text" name="stockProduct"  placeholder="Ingresa el stock del producto">
                    </div>
                 </div>
                 <div class="row mt-3">
                    <div class="col-12">
                       <select class="form-control" name="statusProduct">
                          <option value="0">--Elige una opción--</option>
                          <option value="Stock">Stock</option>
                          <option value="Agotado">Agotado</option>
                       </select>
                    </div>
                 </div>
                 <div class="row mt-3">
                    <div class="col-12">
                       <textarea class="form-control" name="descriptionProduct"rows="4" cols="80" placeholder="Ingresa descripción del producto"></textarea>
                    </div>
                 </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <input type="submit" name="" class="btn btn-primary" value="Crear Producto">
            </div>
            </form>
          </div>
        </div>
      </div>
   </div>



@endsection
