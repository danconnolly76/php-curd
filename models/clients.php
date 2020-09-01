<?php
include_once 'connection.php';
class Clients {
    
    public function insertClients($fname, $lname, $email, $message) {
        $conn = Connection::getConnection();
        $query = 'INSERT INTO clients (fname, lname, email, message) VALUES (?,?,?,?)';
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$stmt=$conn->prepare($query);
        $stmt->bindValue(1, $fname);
        $stmt->bindValue(2, $lname);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $message);
        Connection::closeConnection($conn);
        $stmt->execute();
        return $stmt;
    }
    
    public function readClients() {
        $conn = Connection::getConnection();
        $query = "SELECT * FROM clients";
        $result = $conn->query($query);
        $clients = $result->fetchAll();
        Connection::closeConnection($conn);
        return $clients;
    }

    public function getClientsId($clientId) {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM clients WHERE clients.id = ?");
        $stmt->bindValue(1, $clientId);
        $stmt->execute();
        $client=$stmt->fetch();
        Connection::closeConnection($conn);
        return $client;
    }

    public function updateClients($id, $fname, $lname, $email, $message) {
        $conn = Connection::getConnection();
        $query="UPDATE clients SET fname=:fname, lname=:lname, email=:email, message=:message WHERE id=:id";
        $stmt=$conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':message', $message);
        $affected_rows = $stmt->execute();
        Connection::closeConnection($conn);
        if($affected_rows==1){
            return true;
        }
        return false;
    }

    public function deleteClients($clientGetId) {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("DELETE FROM clients WHERE clients.id = ?");
        $stmt->bindValue(1, $clientGetId);
        $affected_rows=$stmt->execute();
			Connection::closeConnection($conn);
			if($affected_rows==1){
				return true;
			}
			return false;
    }
}
?>