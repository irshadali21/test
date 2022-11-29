<?php

namespace App\Http\Controllers;

use App\Core\HelperFunction;
use App\Models\LaVelina;
use App\Models\LavelinaDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;


class LaVelinaController extends Controller
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
        $tests = LaVelina::get();
        return view('lavelina.index')->with('tests', $tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $advisor = User::get(['id', 'name']);

        return view('lavelina.create')->with('advisor', $advisor);

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
            $lavelina = LaVelina::create([
                'uid' => Str::uuid(),
                'name' => $request->name,
                'title' => $request->title,
                'body' => $request->color,
                'firms' => $request->firms,
                'benefits' => $request->benefits,
                'benefits_in_number' => $request->benefits_in_number,
                'tex_breack' => $request->tax_breack,
                'source' => $request->source,
                'creation_date' => date('d/m/Y H:m:s'),
                'created_by' => Auth::user()->id,
                'advisor_id' => $request->advisor,
            ]);
            foreach ($request->body as $body) {

                LavelinaDetail::create([
                    'lavelina_id' => $lavelina->id,
                    'lavelina_body' => $body,
                ]);
            }

            DB::commit();
            flash('La Velina created successfully!')->success();
            return redirect()->route('lavelina.index');

        } catch (\Exception $e) {

            DB::rollback();
            // dd($e);
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
        $lavelina = LaVelina::where('id', $id)->first();
        if (!$lavelina) {
            flash('LA VELINA did not exist );')->error();
            return redirect()->back();
        }

        $Data = HelperFunction::lavelina($id);

        $pdf = PDF::loadView('lavelina.email', $Data);
        return $pdf->stream();
        // $name = $file->company->company_name . ' - Incarico_Cli - ' . $file->benefit->column1 . ' - ' . $file->year;
        return $pdf->download($name . '.pdf');

        // return view('lavelina.show')->with('lavelian', $lavelina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lavelina = LaVelina::where('id', $id)->first();
        $advisor = User::get(['id', 'name']);
        if (!$lavelina) {
            flash('LA VELINA did not exist );')->error();
            return redirect()->back();
        }
        $body = LavelinaDetail::where('lavelina_id', $id)->get();
        return view('lavelina.edit')->with('lavelina', $lavelina)->with('advisor', $advisor)->with('body', $body);
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
        $lavelina = LaVelina::where('id', $id)->first();
        if (!$lavelina) {
            flash('LA VELINA did not exist );')->error();
            return redirect()->route('lavelina.index');
        }

        DB::beginTransaction();
        try {
            $lavelina = LaVelina::where('id', $id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'body' => $request->color,
                'firms' => $request->firms,
                'benefits' => $request->benefits,
                'benefits_in_number' => $request->benefits_in_number,
                'tax_breack' => $request->tax_breack,
                'source' => $request->source,
                'created_by' => Auth::user()->id,
                'advisor_id' => $request->advisor,
            ]);
            LavelinaDetail::where('lavelina_id', $id)->delete();

            foreach ($request->body as $body) {

                LavelinaDetail::create([
                    'lavelina_id' => $id,
                    'lavelina_body' => $body,
                ]);
            }

            DB::commit();
            flash('La Velina Updated successfully!')->success();
            return redirect()->route('lavelina.index');

        } catch (\Exception $e) {

            DB::rollback();
            // dd($e);
            flash('There was an error')->error();
            return back();

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
        $lavelina = LaVelina::where('id', $id)->first();
        if ($lavelina) {
            LavelinaDetail::where('lavelina_id', $id)->delete();
            $lavelina->delete();
            flash('LA VELINA Deleted')->success();
            return redirect()->back();
        }
        flash('LA VELINA did not exist );')->error();
        return redirect()->back();
    }
}
