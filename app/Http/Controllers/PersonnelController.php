<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use PDF;
use Illuminate\Support\Facades\Hash;

class PersonnelController extends Controller
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
        $data = DB::table('users');
        $data = $data
        ->orderBy('id','DESC')->paginate(100);

         return view('personnel.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personnel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'regex:/^[0-9]+$/'],
        ]);


         User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'employee_id' => $request['employee_id'],
            'prefix' => $request['prefix'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'address' => $request['address'],
            'provinces' => $request['provinces'],
            'districts' => $request['districts'],
            'subdistrict' => $request['subdistrict'],
            'zip_code' => $request['zip_code'],
            'status' => "0",
            'statusEmployee' => "on",
        ]);

        return redirect('personnel-index')->with('message', "บันทึกสำเร็จ");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data =  User::find($id);
dd( $data );
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
        $data =  User::find($id);

        $data->statusEmployee = "off";
        $data->save();
        return redirect('personnel-index')->with('message', "ยกเลิกสำเร็จ");
    }

    public function updateStatus(string $id)
    {
        $data =  User::find($id);

        $data->statusEmployee = "on";
        $data->save();
        return redirect('personnel-index')->with('message', "เปิดใช้สำเร็จ");
    }
}
