<?php
class changepassModels extends database {
    public function changepass($email){
        include './mvc/core/sendMail.php';
        $a = new Database();
        $a->connect();
        $stmt = $a->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $b = checkUser3($code);
            if ($b == TRUE){
                echo "Email sent successfully";
                header('Location: http://localhost:8080/Ecommerce-Website/client/changepass/changepass');
            } else {
                echo "Email sending failed.";
            }
        } else {
            echo "No user found with this email.";
        }
    }
}
?>