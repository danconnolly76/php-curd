<?php
include_once 'connection.php';

class Users {
    
    public function insertUsers($username, $fname, $lname, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $conn = Connection::getConnection();
        $query = 'INSERT INTO users (username, fname, lname, email, password) VALUES (?,?,?,?,?)';
        $stmt=$conn->prepare($query);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $fname);
        $stmt->bindValue(3, $lname);
        $stmt->bindValue(4, $email);
        $stmt->bindValue(5, $hashed_password);
        Connection::closeConnection($conn);
        return $stmt->execute();
    }


    public function loginUsers($username, $password) {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM  users WHERE users.username = ?");
        $stmt->bindValue(1, $username);
        $stmt->execute();
        $client=$stmt->fetch();
         if(password_verify($password, $client['password'])){
             return true;
           Connection::closeConnection($conn);
           } else {
              return false;
            Connection::closeConnection($conn);  
         }
    }

    public function checkUsername($username) {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT username FROM users WHERE users.username = ?");
        $stmt->bindValue(1, $username);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
            Connection::closeConnection($conn);
        } else {
           return false;
           Connection::closeConnection($conn);
        }
    }
}


?>