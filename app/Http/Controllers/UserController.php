<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest as StoreRequest;
use App\Http\Requests\UpdateUserRequest as UpdateRequest;
use App\Models\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $folder_name = 'admin.user.';
    public $route = '/admin/users';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model::all();
        return view($this->folder_name . 'index', [
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folder_name . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            Model::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
            DB::commit();
            return redirect($this->route)->with('success', 'Record add successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $user)
    {
        return view($this->folder_name . 'edit', [
            "data" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            Model::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role
            ]);
            DB::commit();
            return redirect($this->route)->with('success', 'Record Update successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Model::find($id)->delete();
            return 'Record Delete Successfully';
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}
