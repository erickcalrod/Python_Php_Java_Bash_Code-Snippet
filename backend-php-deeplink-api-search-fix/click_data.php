<?php

class ClickData
{
    /**
     * @var string City user is searching for
     */
    public $city;
    
    public function setCity($city){
    	$this->city = $city;
    }
    
    public function getCity(){
    	return $this->city;
    }

    /**
     * @var string Date user is checking in. Format MM/DD/YYYY
     */
    public $checkInDate;
    
    public function setCheckInDate($checkInDate){
    	$this->checkInDate = $checkInDate;
    }
    
    public function getCheckInDate(){
    	return $this->checkInDate;
    }

    /**
     * @var string Date user is checking out. Format MM/DD/YYYY
     */
    public $checkOutDate;
    
    public function setCheckOutDate($checkOutDate){
    	$this->checkOutDate = $checkOutDate;
    }
    
    public function getCheckOutDate(){
    	return $this->checkOutDate;
    }
    
    /**
     * @var string Date user is checking in. Format MM/DD/YYYY
     */
    
    public function setCheckInDateCA($checkInDate){
    	date_format($checkInDate,"d/m/Y");
    	$this->checkInDate = $checkInDate;
    }
    
    public function getCheckInDateCA(){
    	return $this->checkInDate;
    }

    /**
     * @var string Date user is checking out. Format MM/DD/YYYY
     */
    
    public function setCheckOutDateCA($checkOutDate){
    	$this->checkOutDate = $checkOutDate;
    }
    
    public function getCheckOutDateCA(){
    	return $this->checkOutDate;
    }


    /**
     * @var int Number of guests who are traveling
     */
    public $guests;
    
    public function setGuests($guests){
    	$this->guests = $guests;
    }
    
    public function getGuests(){
    	return $this->guests;
    }

    /**
     * @var int Number of rooms being booked
     */
    public $rooms;
    
    public function setRooms($rooms){
    	$this->rooms = $rooms;
    	
	}
    
    public function getRooms(){
    	return $this->rooms;
    }

    /**
     * @var string Code used in deep-link for tracking purposes
     */
    public $trackingID;
    
    public function setTrackingID($trackingID){
    	$this->trackingID = $trackingID;
    }
    
    public function getTrackingID(){
    	return $this->trackingID;
    }

}