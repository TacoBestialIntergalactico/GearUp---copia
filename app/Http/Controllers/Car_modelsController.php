<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Car_Model;
use Exception;
use Illuminate\Http\Request;

class Car_modelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carModel = DB::table('car_models')->get();
        return $carModel;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([                
                'suppliers_id' => 'required|exists:suppliers,id',
            ]);
    
            // Crear el producto sin incluir el campo de imagen
            $carModel = Car_Model::create([
                'name' => $request->input('name'),
                'suppliers_id' => $request->input('suppliers_id'),
            ]);
    
            return response()->json(['message' => 'Car model agregado: ' . $carModel], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Se produjo un error al intentar almacenar: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $carModel = Car_Model::findOrFail($id);
            return response()->json($carModel);
        } catch (Exception $e) {
            return response()->json(['error' => 'Se produjo un error al intentar mostrar: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $carModel = Car_Model::findOrFail($id);
            $data = $request->only([
                'name',
                'suppliers_id',
            ]);
    
            $carModel->fill($data);
            $carModel->save();
    
            return response()->json(["success" => 'Car model updated successfully'], 200);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'An error occurred when trying to update: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $model = Car_Model::findOrFail($id);
            $model->delete();
    
            return response()->json(["success" => 'Model deleted successfully.'], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') { // Código de error de integridad referencial en MySQL
                return response()->json(['error' => 'Cannot delete this model because it is associated with one or more products.'], 400);
            }
            return response()->json(['error' => 'An error occurred when trying to delete: ' . $e->getMessage()], 500);
        } catch (Exception $e) {
            return response()->json(['error' => 'An error occurred when trying to delete: ' . $e->getMessage()], 500);
        }
    }
}
