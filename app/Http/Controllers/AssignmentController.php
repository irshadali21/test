<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Summary;
use Illuminate\Support\Facades\DB;
use PDF;


class AssignmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $file= File::firstorfail();
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        // dd($file->auditor);
        $date = Date('d/m/Y');
        // dd($date);
        $img = 'image/signature/sigh.png';
        // dd($img);
        $fileData = [
            'company_name' => $file->company_name,
            'vat_number' => $file->vat_number,
            'company_address' => $file->company_address,
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,
            'auditor' => $file->auditor->name,
            'auditor_address' => $file->auditor->ofc_address,
            'auditor_pec_email' => $file->auditor->email_pec,
            'date' => $date,
            'signature' => $img,
            // 'date' => $file->auditor->email_pec,
        ];
        // dd($file);
        $pdf = PDF::loadView('assignment.index', $fileData);
        return $pdf->download('test.pdf');
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
