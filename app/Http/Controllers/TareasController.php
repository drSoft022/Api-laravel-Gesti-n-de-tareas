<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Models\PrioridadTareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        try{
            $tareas = Tareas::join("prioridad_tareas","tareas.id_prioridad", "=", "prioridad_tareas.id")
                                ->select('tareas.*', 'prioridad_tareas.nombre')
                                ->paginate(10);
            $prioridades = PrioridadTareas::all();
            return response()->json([
                $tareas,
                "prioridades" => $prioridades
            ]);
        }catch(\Exception $e){
            return response()->json([
                "error" => $e
            ]);
        }
    }


    public function store(Request $request)
    {
        try{
            $request->validate([
                "nombre_tarea" => "required|string|min:6|max:191",
                "descripcion" => "required|string|min:10|max:191",
                "id_prioridad" => "required|integer|min:1",
            ]);

            $tarea = Tareas::create(
                $request->all()
            );

            return response()->json([
                $tarea
            ]);
        }catch(\Exception $e){
            return response()->json([
                "error" => $e->errors()
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        try{
            $tarea = Tareas::findOrFail($id);

            $request->validate([
                "nombre_tarea" => "required|string|min:6|max:191",
                "descripcion" => "required|string|min:10|max:191",
                "id_prioridad" => "required|integer|min:1",
            ]);

            $tarea->update($request->all());

            return response()->json([
                $tarea
            ]);
        }catch(\Exception $e){
            return response()->json([
                "error" => $e->errors()
            ]);
        }
    }


    public function destroy(string $id)
    {
        try{
            $tarea = Tareas::findOrFail($id);

            $tarea->delete();

            return response()->json([
                $tarea
            ]);
        }catch(\Exception $e){
            return response()->json([
                "error" => $e->errors()
            ]);
        }
    }
}
