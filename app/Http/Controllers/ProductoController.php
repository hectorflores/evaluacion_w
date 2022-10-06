<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\ProductosCategoria;


class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::with(['productoCategorias.categorias'])->get(); 
        return view('producto\index',compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = Producto::all();
        $categoria = Categoria::all();
        return view('producto\create',compact('producto','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
        ]);
        
        $data = Producto::create($validatedData);
        $categorias = [];
        if(!empty($request->input('categorias'))){
            foreach($request->input('categorias') as $cat){
                $categorias[] = array('producto_id'=>$data->id, 'categoria_id'=>$cat);
            }
            ProductosCategoria::upsert($categorias,['producto_id','categoria_id']); 
        }
        
        return redirect('producto')->with('success', 'Producto is successfully saved');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $row = Producto::findOrFail($id);
        $categoria = Categoria::all(); 
        $producto_categoria = ProductosCategoria::select('categoria_id')->where('producto_id',$id)->get()->pluck('categoria_id')->toArray(); 
        return view('producto/edit', compact('categoria','row','producto_categoria'));
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
        ]);
        $data = Producto::whereId($id)->update($validatedData);
        $categorias = []; 
        if(!empty($request->input('categorias'))){
            ProductosCategoria::where('producto_id', $id)->delete();
            foreach($request->input('categorias') as $cat){
                $categorias[] = array('producto_id'=>$id, 'categoria_id'=>$cat);
            }
            ProductosCategoria::upsert($categorias,['producto_id','categoria_id']); 
        }
        return redirect('/producto')->with('success', 'Producto is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('/producto')->with('success', 'Producto is successfully deleted');

    }
}
