<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\LeVelina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LeVelinaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:view-report');
        $this->middleware('permission:create-report', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-report', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-report', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = LeVelina::get();
        return view('levelina.index')->with('tests', $tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $advisor = User::pluck('name', 'id');

        return view('levelina.create')->with('advisor', $advisor);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Corbon::now());
        // dd($request->all());

        DB::beginTransaction();
        try {
            $levelina = LaValina::create([
                'name' => $request->name,
                'path' => $request->path,
                'creation_date' => date('d/m/Y H:m:s'),
                'created_by' => Auth::user()->id,
                'advisor_id' => $request->advisor,
            ]);

            DB::commit();
            flash('File created successfully!')->success();
            return redirect()->route('levelina.index');

        } catch (\Exception $e) {

            DB::rollback();
            flash('There was an error')->error();
            return back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
