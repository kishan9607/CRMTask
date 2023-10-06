<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreContactRequest as StoreRequest;
use App\Http\Requests\UpdateContactRequest as UpdateRequest;
use App\Models\Contact as Model;
use App\Models\Lead;

class ContactController extends Controller
{
    public $folder_name = 'admin.contact.';
    public $route = '/admin/contacts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model::with('lead')->get();
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
        $lead = Lead::all();
        return view($this->folder_name . 'create', [
            "lead" => $lead
        ]);
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
                'lead_id' => $request->lead_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number
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
    public function edit(Model $contact)
    {
        return view($this->folder_name . 'edit', [
            "data" => $contact
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
                'lead_id' => $request->lead_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number
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
