<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class ProductsController extends Controller
{
   //compruebo que exista una autenticacion
   public function __construct()
   {
      $this->middleware('auth');
   }

   //Muestro todos los productos de la tabla con el mismo nombre, para poder mostrarlos en la tabla de la vista
   public function all()
   {
      $productos = DB::table('productos')->paginate(5);

      return view('products' , ['productos' => $productos]);

   }

   //genero la vista del formulario de edicion
   public function edit($id)
   {

      $producto = ProductsModel::where('id' , $id)->first();

      return view('editProduct' , ['producto' => $producto]);
   }

   //hago una actualizacion
   public function update(Request $request , $id)
   {

      $data = $request->all();

      $affected = DB::table('productos')
      ->where('id' , $id)
      ->update(
         ['title' => $data['title'] ,
         'description' => $data['description'] ,
         'price' => $data['price'] ,
         'stock' => $data['stock'] ,
         'status' => $data['status'] ,
      ]);


      if($affected > 0)
      {
         $mensaje = "¡Registro actualizado correctamente!";
         return Redirect::to('home')->with(['clase' => 'alert-success' , 'mensaje' => $mensaje]);
      }
      else{
         $mensaje = "¡No pudimos actualizar el registro!";
         return Redirect::to('home')->with(['clase' => 'alert-danger' , 'mensaje' => $mensaje]);
      }

   }

   public function delete($id)
   {
      $affected = DB::table('productos')->where('id', $id)->delete();


      if($affected > 0)
      {
         $mensaje = "¡Registro eliminado correctamente!";
         return Redirect::to('home')->with(['clase' => 'alert-success' , 'mensaje' => $mensaje]);
      }
      else {
         $mensaje = "¡No pudimos eliminar el registro!";
         return Redirect::to('home')->with(['clase' => 'alert-danger' , 'mensaje' => $mensaje]);
      }

   }

   public function create(Request $request)
   {
      $data = $request->all();

      $affected = DB::table('productos')->insert([
         'title' => $data['titleProduct'],
         'description' => $data['descriptionProduct'],
         'price' => $data['priceProduct'] ,
         'stock' => $data['stockProduct'],
         'status' => $data['statusProduct'],
         'created_at' => date('Y-m-d H:i:s')

      ]);


      if($affected > 0)
      {
         $mensaje = "Producto registrado correctamente!";
         return Redirect::to('home')->with(['clase' => 'alert-success' , 'mensaje' => $mensaje]);
      }
      else {
         $mensaje = "¡No pudimos registrar el registro!";
         return Redirect::to('home')->with(['clase' => 'alert-danger' , 'mensaje' => $mensaje]);
      }

   }



}
