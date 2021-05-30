<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deal extends Model
{
    //public $access_token = '1000.bbaa6acabf536ffd493f131da960da39.4b056ef0955244e73c512a12f1c8aa48';
    use HasFactory;
    //public $token;
    /**
     *Request new access token. Return token.
     */
    public function generate_access_token()
    {
        $post = [
            'refresh_token' => "1000.a01cd668f731d8279bc652c8f8e97c8b.27dcc1dfe9dd0e9485405ba0a17e22d7",
            'client_id'     => '1000.6AAOYV0519PYQEFFNX4JV2L8W8QJJI',
            'client_secret' => 'e4a5c329e80f5764a8210320154df1ac60d18a5152',
            'grant_type'    => 'refresh_token'
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://accounts.zoho.com/oauth/v2/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

        $response = curl_exec($ch);
        $response = json_decode($response);
        $array = json_decode(json_encode($response), true);
        $key = $array["access_token"];
        return $key;

    }
    /**
     * Show deals list. Return array.
     */
    public function getDeals()
    {


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://www.zohoapis.com/crm/v2/Deals");
    //curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:Zoho-oauthtoken ' . $this->generate_access_token(),
        'Content-Type: application/x-www-form-urlencoded'));

    $response = curl_exec($ch);
    $response = json_decode($response);
    foreach($response as $object)
    {
        $arrays[] =  (array) $object;
    }
    return $arrays[0];

}
    /**
     * Model to create new deal. (did not use model response checks).
     */

    public function createDeals($data){

        $post_data = [
            "data" => [
                [
                    "Description"      => $data['description'],
                    '$currency_symbol' => 'EUR',
                    "Campaign_Source"  =>  [
                        'name' => "фоззіііііііі",
                        'id'   => "4789250000000356175"
                    ],
                    "Closing_Date"     => '2021-05-15',
                    "Deal_Name"        => $data['name'],
                    "Stage"            => '+Qualification',
                    "Subject"          => $data['subject'],
                    "Account_Name"     => [
                        "name"   => "King",
                        "id"     => "4789250000000317113"
                    ],
                    "Amount"           => "100000",
                    "Probability"      => "10",
                    "Next_Step"        => $data['next_step'],
                    "Contact_Name"     => [
                        "name" => "Kris Marrier",
                        "id"   => "4789250000000317209"
                    ],
                    "Type"             => "New Business",
                    "Lead_Source"      => "Cold Call",


                ]
            ],

            'trigger' => [
                "approval",
                "workflow",
                "blueprint"
            ],
        ];



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.zohoapis.com/crm/v2/Deals");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Zoho-oauthtoken ' . $this->generate_access_token(),
            'Content-Type: application/x-www-form-urlencoded'));

        $response = curl_exec($ch);
        $response = json_decode($response);
        return $response;
    }
    /**
     * Model to create new task for deal by id. (did not use model response checks).
     */
    public function createTask($id){
        $post_data = [
            "data" => [
                [
                    "Description" => $id['description'],
                    "Who_Id" => [
                        "name" => "Kris Marrier (Sample)",
                        "id" => "4789250000000317209"
                    ],
                    "Status" => "Not Started",
                    "Due_Date" => "2021-05-15",
                    "Priority" => "Low",
                    '$editable' => "1",
                    "Subject"     => $id['subject'],
                    '$se_module' => "Deals",
                    "What_Id" => [
                        "id" => $id['id']
                    ]
                ]
            ],
            'trigger' => [
                "approval",
                "workflow",
                "blueprint"
            ]
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.zohoapis.com/crm/v2/Tasks");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Zoho-oauthtoken ' . $this->generate_access_token(),
            'Content-Type: application/x-www-form-urlencoded'));

        $response = curl_exec($ch);
        $response = json_decode($response);
        return $response;
    }

}
