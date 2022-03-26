<?php
$folder = 'fakemail'; //you shoud delete this line
$url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $folder . '/webservice/fm.php';
date_default_timezone_set('Asia/Tehran');


if (isset($_GET['request']) and $_GET['request'] == 'newmail') {
    $request = file_get_contents($url . '?method=getNewMail');
    $result = json_decode($request, true);
    if ($result['ok'] == 'true') {
        $email = $result["results"]["email"];
        setcookie('email', $email, time() + 8640000, '/');
        echo "tr;" . $email;
    } else {
        echo 'error!';
    }
}
if (isset($_GET['request']) and $_GET['request'] == 'showMessages') {
    if (isset($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
        $request = file_get_contents($url . '?method=getMessages&email=' . $email);
        $result = json_decode($request, true);
        if ($result['results'] != 'No Messages In This Fake Mail !') {
            $messages = $result['results'];
            $messag_num = count($messages) - 1;
            for ($i = 0; $i == $messag_num; $i++) {
                $time = explode('.',$messages[$i]['created_at']);
                $time = str_replace('T',' ',$time);
                echo '<p>from : '. $messages[$i]['from'] .'</p><br><p>to : '. $messages[$i]['to'] .'</p><br><p>subject : '. $messages[$i]['subject'] .'</p><hr style="width:50%;" class="bg-danger">'.$messages[$i]['body_html'].'<br><p>'. $time[0] .'</p><hr>';
            }
        }
    } else {
        echo 'error';
    }
}
if (isset($_GET['request']) and $_GET['request'] == 'deleteEmail') {
    if(isset($_COOKIE['email'])){
        setcookie('email', '', time() - 3600, '/');
    }
}