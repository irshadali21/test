<?php

namespace App\Imports;

use App\Models\Firm;
use App\Models\ateco_table;
use App\Models\province_table;
use App\Models\sector_table;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;


class FirmImport implements ToCollection
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function collection(collection $row)
    {
        // dd($row);

        $duplicate = array();

        DB::beginTransaction();
        try {
            for ($i = 0; $i < count($row); $i++) {

                if ($i == 0) {continue;}
                if ($i == 1) {continue;}

                // dd($row[$i]);
                if (empty($row[$i][2])) {continue;}
                if (empty($row[$i][4])) {continue;}

                $province = province_table::where('province', $row[$i][4])->first();
                if(!$province)
                {
                    $name = array();
                    $name = $row[$i][4];
                    array_push($duplicate, $name);
                    continue;
                }
                $ateco = ateco_table::where('code', $row[$i][11])->first();
                if(!$ateco)
                {
                    $name = array();
                    $name = $row[$i][11];
                    array_push($duplicate, $name);
                    continue;
                }
                $sector = sector_table::where('name', $row[$i][10])->first();
                if(!$sector)
                {
                    $name = array();
                    $name = $row[$i][10];
                    array_push($duplicate, $name);
                    continue;
                }

                $firm_name = $row[$i][2];
                $firm_vat_no = $row[$i][1];
                $firm_type = $row[$i][3];
                $province_id = $province->id; 
                $category = $row[$i][5];
                $phone_number =$row[$i][6];
                $firm_owner = $row[$i][7];
                $email = $row[$i][8];
                $email2 = $row[$i][9];
                $sector_id = $sector->id;
                $ateco_id = $ateco->id;
                $created_by = Auth::user()->id;


                $firm =  Firm::create([
                    'firm_name'     => $firm_name,
                    'firm_vat_no'    => $firm_vat_no, 
                    'firm_type'    => $firm_type, 
                    'province_id'    => $province_id, 
                    'category'    => $category, 
                    'phone_number'    => $phone_number, 
                    'firm_owner'    => $firm_owner, 
                    'email'    => $email, 
                    'email2'    => $email2, 
                    'sector_id'    => $sector_id, 
                    'ateco_id'    => $ateco_id, 
                    'created_by'    => $created_by, 
                ]);
                // dd($firm);
            }
            DB::commit();
            $_SESSION['duplicates'] = $duplicate;
        } catch (\Exception $e) {
            dd($e);
            $_SESSION['duplicates'] = ['error'];
            DB::rollback();
            return;
        }
    }

    public function rules(): array
    {
        return [
            '*.firm_vat_no' => ['string', 'unique:Firm,firm_vat_no']
        ];
    }
}
