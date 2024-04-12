<?php

class Participants {
    
    private $first;
    private $last;
    private $phone;
    private $email;
    
    function __construct($first, $last, $phone, $email) {
        $this->first = $first;
        $this->last = $last;
        $this->phone = $phone;
        $this->email = $email;
    }
    
    function getFirst() {
        return $this->first;
    }
    
    function setFirst($first) {
        $this->first = $first;
    }
    
    function getLast() {
        return $this->last;
    }
    
    function setLast($last) {
        $this->last = $last;
    }
    
    function getAddress() {
        return $this->address;
    }
    
    function setAddress($address) {
        $this->address = $address;
    }
    
    function getPhone() {
        return $this->phone;
    }
    
    function setPhone($phone) {
        $this->phone = $phone;
    }
    
    function getEmail() {
        return $this->email;
    }
    
    function setEmail($email) {
        $this->email = $email;
    }
    
    function toString() {
        return "Name: {$this->first} . ' ' . {$this->last}, Address: {$this->street}.', '.{$this->city}.', '.{$this->state}.' '.{$this->zip}, Phone: {$this->phone}, Email: {$this->email}";
    }
    
    function getBSRow() {
        $row = '<div class="row">';
        $row .= '<div class="col-md-4 col-xs-12">' . $this->last . ', ' . $this->first . '</div>';
        $row .= '<div class="col-md-4 col-xs-12">' . $this->phone . '</div>';
        $row .= '<div class="col-md-4 col-xs-12"><a href="#">' . $this->email . '</a></div>';
        $row .= '</div>';
        return $row;
    }
    
}

function createPartFromDB($id) {
    include 'connect.php';
    
    $sql = "SELECT users.first, users.last, users.street, users.city, users.state, users.zip, users.phone, users.email
        FROM participants 
        INNER JOIN users ON participants.user = users.id 
        WHERE participants.event = $id";
    $results = $smeConn->query($sql);
    
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            // Create a Participants object for each participant and add it to the array
            $participant = new Participants($row['first'], $row['last'], $row['phone'], $row['email']);
            $participants[] = $participant;
        }
    } 
    
    return $participants;
}

?>
