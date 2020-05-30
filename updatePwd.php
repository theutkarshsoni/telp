<?php
    session_start();    
	$old_data = file_get_contents('db.json');  
    $current_data = json_decode($old_data, true);
    $flag = 0;
    $form_data = array(  
        'uname' => $_SESSION['uname'],
        'pwd' => md5($_POST['npwd'])
    );
    if($form_data['pwd'] == md5($_POST['cnpwd'])){
        foreach($current_data['users'] as $key => $value) {
            if($form_data['uname'] == $value['uname']){
                $form_data['fname'] = $value['fname'];
                $form_data['lname'] = $value['lname'];
                $form_data['address'] = $value['address'];
                $form_data['phone'] = $value['phone'];
                $current_data['users'][$key] = $form_data;
                $new_data = json_encode($current_data);
                if(file_put_contents('db.json', $new_data))  {
                    $_SESSION['ptemp'] = 'success';
                    header("Location: ./security.php");
                    die();  
                }
            }
        }
    }
    else{
        $_SESSION['ptemp'] = 'error';
        header("Location: ./security.php");
        die();
    }
?>