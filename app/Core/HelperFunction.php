<?php

namespace App\Core;

use Exception;
use Closure;
use App\Models\ApiData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;

class HelperFunction
{

    public static function _uid()
    {
        return md5(date('Y-m-d') . microtime() . rand());
    }


    public static function GetResponse($url, $pramas){

        $api = ApiData::firstorfail();
        $response = Http::withToken($api->token)->get($url, $pramas);

        if($response->successful()){
            return $response;
        }else if($response->failed()){
            // genrate new token and save it
            $response = Http::acceptJson()->post('https://connect.creditsafe.com/v1/authenticate',  [
                'Username' => $api->user_name,
                'Password' => $api->password,
            ]);
            $token = $api['token'] = $response['token'];
            $api->save();
            
            // retry on api request
            $response = Http::withToken($api->token)->get($url, $pramas);

                if($response->successful()){
                    return $response;
                }else if($response->failed()){
                    //its and error with data sent please check the following error
                    dd($response['details'], $response['message']);
                }else if($response->serverError()){
                    dd($response['details'], $response['message']);

                }else{
                    dd('unkown error');
                }
        }else if($response->serverError()){
            dd($response['details'], $response['message']);
        }else{
            dd('unkown error');
        }
    }




}