<?php
    session_start();
	$old_data = file_get_contents('db.json');  
    $current_data = json_decode($old_data, true);  
    $form_data = array(  
        'uname' => $_POST['uname'],
        'pwd' => md5($_POST['pwd'])
    );
    $flag = 0;
    foreach($current_data['users'] as $value) {
        if($form_data['uname'] == $value['uname'] and $form_data['pwd'] == $value['pwd']){
            $_SESSION['uname'] = $value['uname'];
            header("Location: ./home.php");
            die();
        }
        else{
            $flag = 1;
        }
    }
    if($flag == 1){
        $_SESSION['lerror'] = 'invalid';
        header("Location: ./");
        die();
    }
?>