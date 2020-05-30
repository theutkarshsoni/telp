<?php
    session_start();    
	$old_data = file_get_contents('db.json');  
    $current_data = json_decode($old_data, true);
    $flag = 0;
    $form_data = array(  
        'uname' => $_SESSION['uname'],
        'fname' => $_POST['fname'],
		'lname' => $_POST['lname'],
		'address' => $_POST['address'],
		'phone' => $_POST['phone'],
    );
    foreach($current_data['users'] as $key => $value) {
        if($form_data['uname'] == $value['uname']){
            $form_data['pwd'] = $value['pwd'];
            $current_data['users'][$key] = $form_data;
            $new_data = json_encode($current_data);
            if(file_put_contents('db.json', $new_data))  {
                $_SESSION['utemp'] = 'success';
                header("Location: ./profile.php");
                die();  
            }
        }
    }
?>