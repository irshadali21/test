<?php

namespace App\Http\Controllers;

use App\Exports\FilessExport;
use App\Models\ateco_table;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\File;
use App\Models\Firm;
use App\Models\LaVelina;
use App\Models\LaVelinaHistory;
use App\Models\province_table;
use App\Models\sector_table;
use App\Models\Summary;
use App\User;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use PDF;
use Response;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view-reports');
        // $this->middleware('permission:create-report', ['only' => ['create', 'store']]);
        // $this->middleware('permission:update-report', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:destroy-report', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function files()
    {
        $exceptThis = [1];
        $company = Company::get();
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        $advisor = User::pluck('name', 'id');
        return view('reports.files', compact('company', 'benefit', 'advisor'));
    }
    public function firms()
    {
        $advisor = User::get();
        $ateco = ateco_table::get();
        $province = province_table::get();
        $sector = sector_table::get();
        return view('reports.firms', compact('ateco', 'province', 'sector', 'advisor'));
    }
    public function valina()
    {
            $lavelina = LaVelina::get();
        return view('reports.valina', compact('lavelina'));
    }
    public function valinaReceived()
    {
        if (auth()->user()->hasrole('super-admin')) {
            $firms = Firm::get();
        } else {
            $firms = Firm::where('created_by', auth()->user()->id)->get();
        }
        return view('reports.valina_received', compact('firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filesDownload(Request $request)
    {
        // dd($request->all());

        $files = File::Query();

        if (!auth()->user()->hasrole('super-admin')) {
            $files = $files->where('advisor_id', auth()->user()->id);
        }

        if ($request->advisor_name) {
            $files = $files->where('advisor_id', $request->advisor_name);
        }

        if ($request->company) {
            $files = $files->where('company_id', $request->company);
        }

        if ($request->benefits) {
            $files = $files->where('benefit_id', $request->benefits);
        }

        if ($request->opration_email) {
            $files = $files->where('opration_email', 'LIKE', "%{$request->opration_email}%");
        }

        if ($request->inc_send_date) {
            $files = $files->whereHas('EmailTrack', function ($query) use ($request) {
                $from = Carbon::parse($request->inc_send_date)->format('Y-m-d');
                $to = Carbon::parse(now())->format('Y-m-d');
                $query->where('model', '!=', 'App\Models\Certificate');
                $query->whereBetween('created_at', [$from, $to]);
            });
        }

        if ($request->certificate_issue_date) {
            $files = $files->whereHas('EmailTrack', function ($query) use ($request) {
                $from = Carbon::parse($request->certificate_issue_date)->format('Y-m-d');
                $to = Carbon::parse(now())->format('Y-m-d');
                $query->where('model', 'App\Models\Certificate');
                $query->whereBetween('created_at', [$from, $to]);
            });
        }

        if ($request->file_date) {
            $from = Carbon::parse($request->file_date)->format('Y-m-d');
            $to = Carbon::parse(now())->format('Y-m-d');
            $files = $files->whereBetween('created_at', [$from, $to]);
        }

        $files = $files->get();

        if ($files == null || empty($files) || count($files) == 0) {
            if ($request->ajax()) {
                return Response::json([
                    'success' => false,
                    'data' => '',
                ], 200);
            }
            flash(' 0 report Found')->info();

            return redirect()->back();
        }

        $headings = [
            __('lang.VAT Number'),
            __('lang.CompanyNamedownload'),
            __('lang.Phone Number'),
            __('lang.Customer Email'),
            __('lang.Type of Benefits'),
            __('lang.Year'),
            __('lang.Certificat status'),
            __('lang.Incarico Send Date'),
            __('lang.Certification Issue Date'),
            __('lang.DATE PAYMENT'),
            __('lang.Fee'),
            __('lang.AdvisorNamedownload'),
            __('lang.Operation Email'),
        ];

        $filename = date('Y-m-d') . '-File-Report.';

        $data = array();
        $data[] = $headings;

        $files_ids = array();

        // dd($files);

        foreach ($files as $key => $file) {
            if (!in_array($file->id, $files_ids)) {
                $files_ids[] = $file->id;

                $EmailTrack = $file->EmailTrack;
                $Certificate = $file->certificate;

                $benefit = $file->benefit;
                $company = $file->company;
                $advisor = $file->advisor;
                $CertificateSendDate = '-';
                $IncaricoSendDate = '-';
                $datePayment = '-';
                $status = '-';
                $advisor_name = '-';
                $phone_number = '-';
                $customer_email = '-';
                $opration_email = '-';

                if ($file->EmailTrack) {
                    foreach ($file->EmailTrack as $track) {
                        if ($track) {
                            if ($Certificate) {
                                if ($track->model == 'App\Models\Certificate') {
                                    $CertificateSendDate = (string) $track->date;
                                }
                            }
                            if ($track->model == 'App\Models\File::CLI') {
                                $IncaricoSendDate = (string) $track->date;
                            }
                        }
                    }
                }
                if ($Certificate) {
                    if ($Certificate->status == 1) {
                        $status = __('lang.CERTIFIED AND PAID');
                        $datePayment = $Certificate->paid_date;
                    } elseif (strlen($CertificateSendDate) > 1) {
                        $status = __('lang.certified and unpaid');
                    }
                } else {
                    $status = __('lang.TO BE CERTIFIED');
                }

                if (!empty($advisor->name)) {
                    $advisor_name = $advisor->name;
                }
                if (!empty($company->phone_number)) {
                    $phone_number = $company->phone_number;
                }
                if (!empty($file->customer_email)) {
                    $customer_email = $file->customer_email;
                }
                if (!empty($file->opration_email)) {
                    $opration_email = $file->opration_email;
                }
                if (!empty($advisor->name)) {
                    $advisor_name = $advisor->name;
                }

                // if ($Certificate) {
                $value = [
                    $company->vat_number,
                    $company->company_name,
                    $phone_number,
                    $customer_email,
                    $benefit->column1,
                    $file->year,
                    $status,
                    $IncaricoSendDate,
                    $CertificateSendDate,
                    $datePayment,
                    $file->fee,
                    $advisor_name,
                    $opration_email,
                ];
                $data[] = $value;
                // }
            }
        }
        //endforeach

        if ($request->ajax()) {
            return Response::json([
                'success' => true,
                'data' => $data,
            ], 200);
        }
        if ($request->file_type == 1) {
            $datapdf = array();
            // dd($data);
            foreach ($data as $value) {
                $tempdata = [
                    'vat' => $value[0],
                    'name' => $value[1],
                    'phone' => $value[2],
                    'cemail' => $value[3],
                    'benefit' => $value[4],
                    'year' => $value[5],
                    'status' => $value[6],
                    'send' => $value[7],
                    'issue' => $value[8],
                    'payment' => $value[9],
                    'fee' => $value[10],
                    'adname' => $value[11],
                    'opration' => $value[12],
                ];
                array_push($datapdf, $tempdata);
            }
            // dd($datapdf);
            $datapdf = [
                'data' => $datapdf,
            ];
            $pdf = PDF::loadView('exports.files', $datapdf);
            $name = $filename;
            return $pdf->download($name . '.pdf');
        } elseif ($request->file_type == 2) {
            $export = new FilessExport($data);
            return Excel::download($export, $filename . 'xlsx');
        }

        flash('There was an Error')->info();
        return redirect()->back();
    }

    public function firmsDownload(Request $request)
    {
        $firms = new Firm;

        if (!auth()->user()->hasrole('super-admin')) {
            $firms = $firms->where('created_by', auth()->user()->id);
        }

        if ($request->firm_name) {
            $firms = $firms->where('firm_name', 'LIKE', "%{$request->firm_name}%");
        }
        if ($request->ateco) {
            $firms = $firms->where('ateco_id', $request->ateco);
        }
        if ($request->sector) {
            $firms = $firms->where('sector_id', $request->sector);
        }
        if ($request->province) {
            $firms = $firms->where('province_id', $request->province);
        }
        if ($request->category) {
            $firms = $firms->where('category', 'LIKE', "%{$request->category}%");
        }
        if ($request->firm_type) {
            $firms = $firms->where('firm_type', 'LIKE', "%{$request->firm_type}%");
        }
        if ($request->advisor) {
            $firms = $firms->where('created_by', $request->advisor);
        }

        $firms = $firms->get();

        if ($firms == null || empty($firms) || count($firms) == 0) {
            flash(' 0 report Found')->info();
            return redirect()->back();
        }
        $headings = [
            __('lang.AdvisorNamedownload'),
            __('lang.CompanyNamedownload'),
            __('lang.VAT Number'),
            __('lang.Typedownlaod'),
            __('lang.Province'),
            __('lang.Category'),
            __('lang.Phone Number'),
            __('lang.Contact Person'),
            'Email',
            'Email2',
            __('lang.Sector'),
            __('lang.Ateco Code'),
        ];

        $filename = date('Y-m-d') . '-Firm-Report.';

        $data = array();
        $datapdf = array();
        $firmscheck = array();

        $data[] = $headings;

        $province = '-';
        $sector = '-';
        $ateco = '-';
        $advisor = '-';

        // dd($firms);

        foreach ($firms as $key => $firm) {
            if (!in_array($firm->id, $firmscheck)) {
                // dd($firm->id);
                $firmscheck[] = $firm->id;

                $FName = $firm->firm_name;
                $vatN = $firm->firm_vat_no;
                $type = $firm->firm_type;
                $category = $firm->category;
                $phone_number = $firm->phone_number;
                $fOwner = $firm->firm_owner;
                $email = $firm->email;
                $email2 = $firm->email2;

                if (!empty($firm->levlelina_advisor)) {
                    $advisor = $firm->levlelina_advisor->name;
                }
                if (!empty($firm->ateco->code)) {
                    $ateco = $firm->ateco->code;
                }
                if (!empty($firm->sector)) {
                    $sector = $firm->sector->name;
                }
                if (!empty($firm->province->province)) {
                    $province = $firm->province->province;
                }
                if ($request->file_type == 1) {

                    $tempdata = [
                        'advisor' => $advisor,
                        'name' => $FName,
                        'vat' => $vatN,
                        'type' => $type,
                        'province' => $province,
                        'category' => $category,
                        'phone' => $phone_number,
                        'contact_person' => $fOwner,
                        'email' => $email,
                        'email2' => $email2,
                        'sector' => $sector,
                        'ateco' => $ateco,
                    ];
                    array_push($datapdf, $tempdata);

                    $value = [
                        $advisor,
                        $FName,
                        $vatN,
                        $type,
                        $province,
                        $category,
                        $phone_number,
                        $fOwner,
                        $email,
                        $email2,
                        $sector,
                        $ateco,

                    ];
                    $data[] = $value;

                } elseif ($request->file_type == 2) {
                    $value = [
                        $advisor,
                        $FName,
                        $vatN,
                        $type,
                        $province,
                        $category,
                        $phone_number,
                        $fOwner,
                        $email,
                        $email2,
                        $sector,
                        $ateco,

                    ];
                    $data[] = $value;
                }
            }
        }

        if ($request->ajax()) {
            return Response::json([
                'success' => true,
                'data' => $data,
            ], 200);
        }

        if ($request->file_type == 1) {
            $datapdf = ['data' => $datapdf];
            $pdf = PDF::loadView('exports.firms', $datapdf);
            $name = $filename;
            return $pdf->download($name . '.pdf');
        } elseif ($request->file_type == 2) {
            $export = new FilessExport($data);
            return Excel::download($export, $filename . 'xlsx');
        }
        flash('There was an error')->info();
        return redirect()->back();
    }

    public function valinaDownload(Request $request)
    {

        $valina = LaVelina::where('id', $request->lavelina)->with('history')->first();

        // dd(
        //     $valina->history[0]->cluster->name,
        //     $valina->history[0]->firm->firm_name,
        //     $valina->history[0]->firm->firm_vat_no,
        //     $valina->history[0]->email_sent_by->name,
        // );

        if ($valina == null || empty($valina)) {
            flash(' 0 report Found')->info();
            return redirect()->back();
        }

        $headings = [
            __('lang.VAT Number'),
            __('lang.CompanyNamedownload'),
            __('lang.DATE'),
            __('lang.Cluster'),
        ];

        $filename = date('Y-m-d') . '-Valina-Report.';

        $data = array();
        $datapdf = array();
        $valinascheck = array();

        // $date = Carbon::parse($valina->created_at)->format('D m.d.Y H:i');
        $date = $this->formatedDate($valina->created_at);
        $valina_data[] = $valina->id;
        $valina_data[] = $valina->name;
        $valina_data[] = $date;

        $valinaheading = [
            'ID',
            __('lang.VALINA Name'),
            __('lang.CREATION Date'),
        ];
        $emptyspace = [
            '',
            '',
            '',
        ];
        $data[] = $valinaheading;
        $data[] = $valina_data;
        $data[] = $emptyspace;
        $data[] = $emptyspace;
        $data[] = $headings;

        foreach ($valina->history as $key => $history) {

            if (!in_array($history->id, $valinascheck)) {
                $valinascheck[] = $history->id;

                $vat = '-';
                $company = '-';
                // $date = Carbon::parse($history->created_at)->format('D m.d.Y H:i');
                $date = $this->formatedDate($history->created_at);
                $cluster = '-';
                if (!empty($history->firm)) {
                    $vat = $history->firm->firm_vat_no;
                }
                if (!empty($history->firm)) {
                    $company = $history->firm->firm_name;
                }
                if (!empty($history->sector)) {
                    $date = $history->sector->name;
                }
                if (!empty($history->cluster)) {
                    $cluster = $history->cluster->name;
                }
                if ($request->file_type == 1) {

                    $tempdata = [
                        'vat' => $vat,
                        'name' => $company,
                        'date' => $date,
                        'cluster' => $cluster,
                    ];
                    array_push($datapdf, $tempdata);

                    $value = [
                        $vat,
                        $company,
                        $date,
                        $cluster,
                    ];
                    $data[] = $value;
                } elseif ($request->file_type == 2) {
                    $value = [
                        $vat,
                        $company,
                        $date,
                        $cluster,
                    ];
                    $data[] = $value;
                }
                // }
            }
        }

        if ($request->ajax()) {
            return Response::json([
                'success' => true,
                'data' => $data,
            ], 200);
        }
        if ($request->file_type == 1) {
            // $date = Carbon::parse($valina->created_at)->format('D m.d.Y H:i');
            $date = $this->formatedDate($valina->created_at);
            $valina_data['valina_id'] = $valina->id;
            $valina_data['name'] = $valina->name;
            $valina_data['date'] = $date;
            $datapdf1 = array();
            $datapdf1['data'] = $datapdf;
            $datapdf1['valina_data'] = $valina_data;
            $pdf = PDF::loadView('reports.valina_pdf', $datapdf1);
            $name = $filename;
            return $pdf->download($name . '.pdf');
        } elseif ($request->file_type == 2) {
            $export = new FilessExport($data);
            return Excel::download($export, $filename . 'xlsx');
        }
        flash('There was an error')->info();
        return redirect()->back();
    }

    public function valinaReceivedDownload(Request $request)
    {

        $firm = Firm::where('id', $request->firm)->with('levlelina_sent_history')->first();
// dd($firm);

        if ($firm == null || empty($firm)) {
            flash(' 0 report Found')->info();
            return redirect()->back();
        }

        $headings = [
            'ID',
            __('lang.VALINA Name'),
            __('lang.DATE'),
            __('lang.Cluster'),
        ];

        $filename = date('Y-m-d') . '-Valina-Received-Report.';

        $data = array();
        $datapdf = array();
        $firmscheck = array();

        // $date = Carbon::parse($firm->created_at)->format('D m.d.Y H:i');
        $date = $this->formatedDate($firm->created_at);
        $firm_data[] = $firm->id;
        $firm_data[] = $firm->firm_name;
        $firm_data[] = $date;

        $firmheading = [
            'ID',
            __('lang.Firm Name'),
            __('lang.CREATION Date'),
        ];
        $emptyspace = [
            '',
            '',
            '',
        ];
        $data[] = $firmheading;
        $data[] = $firm_data;
        $data[] = $emptyspace;
        $data[] = $emptyspace;
        $data[] = $headings;#


        if ( !$firm->levlelina_sent_history == null || !empty($firm->levlelina_sent_history)) {

        foreach ($firm->levlelina_sent_history as $key => $history) {

            if (!in_array($history->id, $firmscheck)) {
                $firmscheck[] = $history->id;
                $id = '-';
                $valina_name = '-';
                // $date = Carbon::parse($history->created_at)->format('D m.d.Y H:i');
                $date = $this->formatedDate($history->created_at);
                $cluster = '-';
                if (!empty($history->valina)) {
                    $id = $history->valina->id;
                }
                if (!empty($history->valina)) {
                    $valina_name = $history->valina->name;
                }
                if (!empty($history->cluster)) {
                    $cluster = $history->cluster->name;
                }
                if ($request->file_type == 1) {

                    $tempdata = [
                        'id' => $id,
                        'name_valina' => $valina_name,
                        'date' => $date,
                        'cluster' => $cluster,
                    ];
                    array_push($datapdf, $tempdata);

                    $value = [
                        $id,
                        $valina_name,
                        $date,
                        $cluster,
                    ];
                    $data[] = $value;
                } elseif ($request->file_type == 2) {
                    $value = [
                        $id,
                        $valina_name,
                        $date,
                        $cluster,
                    ];
                    $data[] = $value;
                }
                // }
            }
        }
    }
        if ($request->ajax()) {
            return Response::json([
                'success' => true,
                'data' => $data,
            ], 200);
        }
        if ($request->file_type == 1) {
            // $date = Carbon::parse($firm->created_at)->format('D m.d.Y H:i');
            $date = $this->formatedDate($firm->created_at);
            $firm_data['id'] = $firm->id;
            $firm_data['name'] = $firm->firm_name;
            $firm_data['date'] = $date;
            $datapdf1 = array();
            $datapdf1['data'] = $datapdf;
            $datapdf1['firm_data'] = $firm_data;
            $pdf = PDF::loadView('reports.valina_received_pdf', $datapdf1);
            $name = $filename;
            return $pdf->download($name . 'pdf');
        } elseif ($request->file_type == 2) {
            $export = new FilessExport($data);
            return Excel::download($export, $filename . 'xlsx');
        }
        flash('There was an error')->info();
        return redirect()->back();
    }


}
