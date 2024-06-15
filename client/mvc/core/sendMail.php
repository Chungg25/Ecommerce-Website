<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';


function checkUser2($email) {  
    $mail = new PHPMailer(); 
    $data = new Database();
    $data->connect();
    $email = mysqli_real_escape_string($data->conn, $email);
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $run_sql = mysqli_query($data->conn, $check_email);
    echo mysqli_num_rows($run_sql);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($data->conn, $insert_code);
        if($run_query){
            $mail->SMTPDebug = 0;  
            $mail->Mailer = "smtp"; 
            $mail->isSMTP();                          
            $mail->Host = 'smtp.gmail.com';            
            $mail->SMTPAuth = true;                     
            $mail->Username = '52200155@student.tdtu.edu.vn';                 
            $mail->Password = 'eags pwty jjij hsuq';       
            $mail->SMTPSecure = 'tls';                  
            $mail->Port = 587;
            $mail->setFrom('52200155@student.tdtu.edu.vn', 'WEBCK-N11');
            $mail->addAddress($email);    
            $mail->isHTML(true);                                  
            $mail->Subject = 'Password Reset Code';
            $mail->Body    = "Your password reset code is $code";
            $mail->send(); 
            return TRUE;
        }
        
    }
}
    
function checkUser3($code) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function checkUser4($pass1, $code) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    
    if ($rowCount > 0) {
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE code = ?");
        $stmt->bind_param("ss", $pass1, $code);
        $stmt->execute();
        $stmt->close();
        return TRUE;
    }
    return FALSE;
}  
?>