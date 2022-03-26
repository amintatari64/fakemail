<?php
/*

» In The Name Of God «

Source Name »  Web Api Get Fake Mail & Get Messages Of Fake Mails


*/
//========== Header ==========
error_reporting(false);
header('Content-Type: application/json;charset=utf-8');
//========== Function's ==========
function getNewMail($name, $domain)
    {
        $cp = curl_init('https://api.internal.temp-mail.io/api/v2/email/new');
        curl_setopt_array($cp, [
            CURLOPT_POSTFIELDS => json_encode(['name' => $name, 'domain' => $domain]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5351 (KHTML, like Gecko) Chrome/37.0.857.0 Mobile Safari/5351'
        ]);
        $kobs = json_decode(curl_exec($cp),true);
        unset($kobs['token']);
        return $kobs;
        curl_close($cp);
    }
//------------------------------------
function getMessages($email)
    {
        return json_decode(file_get_contents('https://api.internal.temp-mail.io/api/v2/email/' . $email . '/messages'), true)?: 'No Messages In This Fake Mail !';
    }
//------------------------------------
function getDomains()
    {
        $dm = json_decode(file_get_contents('https://api.internal.temp-mail.io/api/v2/domains'), true)['domains'];
        return $dm[rand(0, count($dm)-1)];
        
    }
//========== Script ==========
if(isset($_GET['method']) && $_GET['method'] != NULL){
    if($_GET['method'] == 'getNewMail'){ // Get New Fake Mail
        $results = getNewMail('....MATchannel1....'.rand(0,9999), getDomains());
        echo json_encode(
            array_merge(
                [
                    'ok'=> true,
                    'results'=>$results
                ]
            ),448
        );
    }elseif($_GET['method'] == 'getMessages'){ // Get Messages Of Fake Mails
        if(isset($_GET['email']) && $_GET['email'] != NULL){
            $results = getMessages($_GET['email']);
            echo json_encode(
                array_merge(
                    [
                        'ok'=> true,
                        'results'=>$results
                    ]
                ),448
            );
        }else{ // Empty email Parameter
            echo json_encode(
                array_merge(
                    [
                        'ok'=> false,
                        'results'=>'Where Is Fucking email Parameter !?!'
                    ]
                ),448
            );
        }
    }else{ // Invalid method Parameter
        echo json_encode(
            array_merge(
                [
                    'ok'=> false,
                    'results'=>'method Must Be getNewMail Or getMessages !?!'
                ]
            ),448
        );
    }
}else{ // Empty method Parameter
    echo json_encode(
        array_merge(
            [
                'ok'=> false,
                'results'=>'Where Is Fucking method Parameter !?!'
            ]
        ),448
    );
}
/*

» In The Name Of God «

Source Name »  Web Api Get Fake Mail & Get Messages Of Fake Mails

Coder » T.me/Aquarvis - T.me/Mr_Mordad

Channel » T.me/LegacySource - T.me/IceSource

*/