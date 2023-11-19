<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use App\Models\Material;



class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('materials')->join('storage_locations', 'materials.code_material_storage', '=', 'storage_locations.code_storage')->paginate(100);

        return view('material.index',['data' => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('storage_locations')->where('status','on')->get();
        return view('material.create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $random = "mate-" . Str::random(10);

        $data = new Material;
        $data->code_material = $random;
        $data->material_name = $request['material_name'];
        $data->material_number = $request['material_number'];
        $data->name_material_count = $request['name_material_count'];
        $data->code_material_storage = $request['code_material_storage'];
        $data->damaged_number = 0;
        $data->bet_on_distribution_number = 0;
        $data->wasteful_number = 0;
        $data->repair_number = 0;
        $data->status = "on";
        $data->save();

        return redirect('material-index')->with('message', "บันทึกสำเร็จ");


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $mate =  Material::find($id);
        $data = DB::table('storage_locations')->where('status','on')->get();
        return view('material.edit',['mate' => $mate ,'data' =>   $data ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  Material::find($id);
        $data->material_name = $request['material_name'];
        $data->material_number = $request['material_number'];
        $data->name_material_count = $request['name_material_count'];
        $data->code_material_storage = $request['code_material_storage'];
        $data->save();

        return redirect('material-index')->with('message', "บันทึกสำเร็จ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
