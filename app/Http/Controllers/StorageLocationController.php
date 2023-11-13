<?php

namespace App\Http\Controllers;

use App\Models\StorageLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StorageLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('storage_location.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('storage_location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $randomStorage = "stgLoc-" . Str::random(10);

        $data = new StorageLocation;
        $data->code_storage = $randomStorage;
        $data->building_name = $request['building_name'];
        $data->floor = $request['floor'];
        $data->room_name = $request['room_name'];
        $data->status = "on";
        $data->save();

        return redirect('storage-index')->with('message', "บันทึกสำเร็จ");

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
