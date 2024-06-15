<?php
class forgotpassModels extends database {
    public function forgotpass($email){
        include './mvc/core/sendMail.php';
        $a = new Database();
        $a->connect();
        $stmt = $a->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $b = checkUser2($email);
            if ($b == TRUE){
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
        return FALSE;
    }
}
?>