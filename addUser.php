<?php
    session_start();
	$old_data = file_get_contents('db.json');  
    $current_data = json_decode($old_data, true);
    $flag = 0;
    $form_data = array(  
        'uname' => $_POST['uname'],
        'pwd' => md5($_POST['pwd']),
        'fname' => $_POST['fname'],
		'lname' => $_POST['lname'],
		'address' => $_POST['address'],
		'phone' => $_POST['phone'],
    );
    foreach($current_data['users'] as $value) {
        if($form_data['uname'] == $value['uname']){
            $flag = 1;
            break;
        }
    }
    if($flag == 1){
        $_SESSION['serror'] = 'invalid';
        header("Location: ./signup.php");
        die();
    }
    else{
        $current_data['users'][] = $form_data;  
        $new_data = json_encode($current_data);
        if(file_put_contents('db.json', $new_data))  {
            $_SESSION['uname'] = $form_data['uname'];
            header("Location: ./home.php");
            die();  
        } 
    }
?>