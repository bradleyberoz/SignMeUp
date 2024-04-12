<?php

class Event {
    private $id;
    private $name;
    private $location;
    private $address;
    private $date;
    private $time;
    private $organizerEmail;
    
    function __construct($id, $name, $location, $address, $date, $time, $organizerEmail) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->address = $address;
        $this->date = $date;
        $this->time = $time;
        $this->organizerEmail = $organizerEmail;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getLocation() {
        return $this->location;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function getAddress() {
        return $this->address;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function getDate() {
        return $this->date;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getTime() {
        return $this->time;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function getOrganizerEmail() {
        return $this->organizerEmail;
    }

    function setOrganizerEmail($organizerEmail) {
        $this->organizerEmail = $organizerEmail;
    }

    function toString() {
        return "Event: {$this->name}, Location: {$this->location} - {$this->address}, Date: {$this->date}, Time: {$this->time}, Organizer Email: {$this->organizerEmail}";
    }

    function getBSRow() {
        $row = '<div class="row">';
        $row .= '<div class="col-md-5 col-xs-12">' . $this->name . '</div>';
        $row .= '<div class="col-md-5 col-xs-12">' . $this->date . ' @ ' . $this->time .'</div>';
        $row .= '<div class="col-md-2 col-xs-12">';
        $row .= '<a href="https://www.google.com/maps/search/?api=1&query=' . urlencode($this->address) . '"  title="View on Google Maps">  <i class="fa fa-map-marker">  </i>  </a>';
        $row .= '<a href="#' . $this->organizerEmail . '" ><i class="fa fa-envelope"></i></a>';
        $row .= '</div>';
        $row .= '</div>';
        return $row;
    }
}

function createEventFromDB($id) {
    include 'connect.php';

    $sql = "SELECT events.*, users.*
            FROM events
            JOIN users ON events.organizer = users.id
            WHERE events.id = $id";
    $results = $smeConn->query($sql);

    if ($results->num_rows > 0) {
        $row = $results->fetch_assoc();
        $event = new Event($row['id'], $row['name'], $row['location'], $row['address'], $row['date'], $row['time'], $row['email']);
        return $event;
    } else {
        return null;
    }
}

?>
