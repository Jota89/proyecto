<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

use DataTables;

class ProductoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $productos = Producto::get();
        
        if($request->ajax()){
            $allData = DataTables::of($productos)
            ->addIndexColumn()
            ->addColumn('modificar',function($row){
                $btn = '<a href"javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Editar" class="edit editProducto btn btn-primary btn-sm" style="text-align: center;width: 50px; margin:0 auto; cursor:pointer; display: block;"><i class="far fa-edit"></i></a>';
                return $btn;
            })
            ->addColumn('eliminar',function($row){
                $btn2 = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Borrar" class="delete deleteProducto btn btn-danger btn-sm" style="text-align: center;width: 50px; margin:0 auto; cursor:pointer; display: block;"><i class="far fa-trash-alt"></i> </a>';
                return $btn2;
            })
            ->rawColumns(['modificar','eliminar'])
            ->make(true);

            return $allData;
        }

        return view('admin.productos',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'proveedor' => 'required',
            'estado' => 'required'
            
        ]);

        $producto = Producto::updateOrCreate(
            ['id' => $request->id],
            [
                'nombre' => $request->nombre,
                'codigo' => $request->codigo,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'proveedor' => $request->proveedor,
                'estado' => $request->estado
                
            ],
        );

        return response()->json(['success'=>'Producto creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        
        $datos = [
            'producto'=>$producto,
            
        ];
        return response()->json($datos);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::find($id)->delete();
        return response()->json(['success'=>'Producto eliminado correctamente']); 
    }
}
