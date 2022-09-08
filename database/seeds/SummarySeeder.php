<?php

use Illuminate\Database\Seeder;
use App\Models\Summary;
use App\Models\ApiData;

class SummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Summary::create([
            'column1' => 'activity', 
            'column2' => 'requirements', 
            'column3' => 'tax codes', 
            'column4' => 'rate of expenses attributable to 31/12/22', 
            'column5' => 'maximum rate of expenses attributable to 31/12/22 (per annum)', 
            'column6' => 'rate of expenses attributable from 1/1/23 to 31/12/31', 
            'column7' => 'rate of expenses attributable from 1/1/23 to 31/12/31 (per annum)', 
            'column8' => 'rate of expenses attributable from 1/1/23 to 31/12/23', 
            'column9' => 'maximum rate of expenses attributable from 1/1/23 (per annum)', 
            'column10' => 'rate of expenses attributable to 31/12/23', 
            'column11' => 'maximum rate of expenses attributable to 31/12/23 (per annum)', 
            'column12' => 'rate of expenses attributable from 1/1/24 to 31/12/25', 
            'column13' => 'maximum rate of expenses attributable from 1/1/24 to 31/12/25 (per annum)', 
            'column14' => 'type of company for F4.0 (tax code 6897)', 
            'column15' => 'rate of expenses attributable from 17/5/22', 
            'column16' => 'maximum rate of expenses attributable from 17/5/22', 
            'column17' => 'rate of expenses attributable to Law 50-17 / 5/22 art.22 c.1 (training carried out by bodies not accredited by the MISE before 17/5/22)', 
            'column18' => 'maximum rate of expenses attributable to Law 50-17 / 5/22 art.22 c.1 (training carried out by bodies not accredited by the MISE before 17/5/22)', 
            'column19' => 'rate of expenses attributable to Law 50-17 / 5/22 art.22 c.2 (training carried out by bodies not accredited by the MISE after 17/5/22)', 
            'column20' => 'maximum rate of expenses attributable to Law 50-17 / 5/22 art.22 c.2 (training carried out by bodies not accredited by the MISE after 17/5/22)', 
            'column21' => 'company size valid for R&D ONLY FOR INCREASE 6939 (SUD Bonus)', 
            'column22' => 'rate of expenses attributable with SUD increase (tax code 6939) at 12/31/22 - Tax code 6939 to be used ONLY for companies in the South (Abruzzo, Basilicata, Calabria, Campania, Molise, Puglia, Sardinia, Sicily)', 
            'column23' => 'list of regions tax code 6939', 
        ]);

        Summary::create([
        
            'column1' => 'FORMAZIONE 4.0'
        
        ]);
        Summary::create([
        
            'column1' => 'R&S'
        
        ]);
        Summary::create([
        
            'column1' => 'INNOVAZIONE TECNOLOGICA'
        
        ]);
        Summary::create([
        
            'column1' => 'INNOVIONE DIGITALE 4.0 & GREEN'
        
        ]);
        Summary::create([
        
            'column1' => 'INNOVAZIONE & DESIGN'
        
        ]);
        ApiData::create([

            'user_name' => 'antonio.sforza@marengineering.it',
            'password' => '3Lu9ondt3s?0QuJbNQbx||s>',
            'token' => 'eyJhbGciOiJSUzI1NiIsImtpZCI6ImNZOGpqZXByakZOZDdVS1FrQ08zcVVycDZMNCIsInR5cCI6IkpXVCIsIng1dCI6ImNZOGpqZXByakZOZDdVS1FrQ08zcVVycDZMNCJ9.eyJuYmYiOjE2NjI1MjY0NDQsImV4cCI6MTY2MjUzMDA0NCwiaXNzIjoiaHR0cHM6Ly9teWxvZ2luLmNyZWRpdHNhZmUuY29tIiwiYXVkIjpbImh0dHBzOi8vbXlsb2dpbi5jcmVkaXRzYWZlLmNvbS9yZXNvdXJjZXMiLCJjb25uZWN0X2FwaSIsInVib19hcGlfZ2F0ZXdheSJdLCJjbGllbnRfaWQiOiJjb25uZWN0LmFwaS5jbGllbnQiLCJzdWIiOiIxMDE0Njg2MDciLCJhdXRoX3RpbWUiOjE2NjI1MjY0NDQsImlkcCI6ImxvY2FsIiwidXNlcm5hbWUiOiJhbnRvbmlvLnNmb3J6YUBtLS1yaW5nLml0LmNvbm4iLCJlbWFpbCI6ImFudG9uaW8uc2ZvcnphQG1hcmVuZ2luZWVyaW5nLml0IiwiY3VzdG9tZXJJZCI6IjEwMTY3MzUzMSIsImNvdW50cnkiOiJDMCIsInVzZXJSb2xlIjoiQ3VzdG9tZXJTZW5pb3JVc2VyIiwid2ViUm9sZUlkIjoiMTAwIiwic2JfY291bnRyeSI6IklUIiwic2NvcGUiOlsiY29ubmVjdF9hcGkiLCJ1Ym9fYXBpX2dhdGV3YXkiXSwiYW1yIjpbInB3ZCJdfQ.ZsibdsQ3KRzf3DDUAgMAcrG7CKvpGTg_uQ6ZZ_veeUCwXErMpD_i9hGNct2j8YGZVmDQe_ATa8APVaH94tyiiWa_qhKZcqodgqN-n098GPcSBb3T4WX1fGLxpcBN-JeG7P6g61YnDKSo-DFEXzmYMi3p9iWaClJpM5NInBgH0YT-DxCzDdeQV8YYfGxL5hMDxrzhY6WAdNLdpo9kv3nhEg7y9V1U_Fihclh9JBqn3EUzxT00pmTEuzUo_n6Sj5OelHkmHZGIyXpyq55hbswparx8bjoTQhY6a-fCWVpy2bIuQOQx3zL3YT4_yg4STxjq0m2RzHdqpfSDam1Bjip_1Q'

        ]);
    }
}
