<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lead;
use App\Models\User;

class AssignLeadController extends Controller
{
    public $folder_name = 'admin.assign-lead.';
    public $route = '/admin/assign-leads';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lead::with('users')->get();
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
        $user = User::where('role', 'User')->get();
        return view($this->folder_name . 'create', [
            "lead" => $lead,
            "user" => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $lead = Lead::find($request->lead_id);
            $lead->users()->attach($request->user_id);
            return redirect($this->route)->with('success', 'Record add successfully.');
        } catch (\Throwable $th) {
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
            $lead = Lead::find($id);
            return 'Record Delete Successfully';
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    public function myLeads()
    {
        $data = auth()->user()->leads;
        return view('user.my-leads', [
            "data" => $data
        ]);
    }

    public function changeLeadStatus($id, $status)
    {
        Lead::where('id', $id)->update(['status' => $status]);
        return response()->json(['success' => 'Status changed successfully.']);
    }
}
