<?php


namespace App;


use Illuminate\Support\Facades\Http;

class zohoService
{
    public function callApi($id){
        $access_token = config('services.zoho.token');;
        $ch = curl_init();
        //$url = config('services.zoho.url');
        //dd($url);
        //$url = $url.$id;

        curl_setopt($ch, CURLOPT_URL, config('services.zoho.url'));
        //curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Zoho-oauthtoken ' . $access_token,
            'Content-Type: application/x-www-form-urlencoded'));

        $response = curl_exec($ch);
        $response = json_decode($response);
        dd($response);
        return redirect()->route('get');
    }
}
