<?php
    session_start();
	$old_data = file_get_contents('db.json');  
    $current_data = json_decode($old_data, true);
    date_default_timezone_set("Asia/Calcutta");
    $form_data = array(  
        'uname' => $_SESSION['uname'],
		'comment' => $_POST['comment'],
		'date' => date("Y-m-d H:i:s", time())
    );
    $current_data['comments'][] = $form_data;  
    $new_data = json_encode($current_data);
    if(file_put_contents('db.json', $new_data))  {  
        $_SESSION['ctemp'] = 'success';
        header("Location: ./home.php");
        die();  
    } 
?>