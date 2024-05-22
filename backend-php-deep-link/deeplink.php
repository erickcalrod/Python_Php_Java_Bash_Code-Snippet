<?php

class HotelClickHandlerAdvertiserUS
{
    /**
     * Returns a US formatted deep-link using the supplied ClickData
     *
     * @param $clickData ClickData
     * @return string
     */
	     
    public function GetUrlUsingClickData($clickData)
    {
        // Expected deep-link format: http://advertiser.com/?city=Los%20Angeles%2C%20CA&checkInDate=01/20/2014&checkOutDate=01/25/2014&room[0]=2&room[1]=1&tracking=1423
        $city = rawurlencode($clickData->getCity());  
        $checkInDate = $clickData->getCheckInDate();
        $checkOutDate = $clickData->getCheckOutDate();
        $trackingID = $clickData->getTrackingID();
        $room = $clickData->getRooms();
        $guests = $clickData->getGuests();
    	$rooms = array();
    	
    	
    	for($a = 0;$a < $room; $a++){	
    	//$room += $room[$a];
    	 if($guests > $room){
    		$rooms[$a] = ceil($guests/$room);
    		$groom = 'room[' . $a . ']'; 
    		if(fmod($guests, $room) != 0){
    		$a += 1;
    		$rooms[$a] = fmod($guests, $room);
    		$groom2 = "room[" . $a . "]"; 
    	}
    		break;
    	}
    	}
    	
    	$rm = implode($rooms);    	

        $url = 'http://advertiser.com/?city=' . $city . '&checkInDate=' . $checkInDate . '&checkOutDate=' . $checkOutDate .  '&' . $groom . '=' . $rm[0] . '&' . $groom2 . '=' . $rm[1] . $trackingID;
        return $url;
    }
}

class HotelClickHandlerAdvertiserCA
{
    /**
     * Returns a CA formatted deep-link using the supplied ClickData
     *
     * @param $clickData ClickData
     * @return string
     */
    public function GetUrlUsingClickData($clickData)
    {
     $city = rawurlencode($clickData->getCity());  
        $checkInDate = $clickData->getCheckInDateCA();
        $dateI = date_create_from_format('m/d/Y', $checkInDate);
    	$checkIn = date_format($dateI,"d/m/Y");
        $checkOutDate = $clickData->getCheckOutDate();
        $dateO = date_create_from_format('m/d/Y', $checkOutDate);
    	$checkOut = date_format($dateO,"d/m/Y");
        $trackingID = $clickData->getTrackingID();
        
        $room = $clickData->getRooms();
        $guests = $clickData->getGuests();
    	$rooms = array();
    	
    	for($a = 0;$a < $room; $a++){	
    	//$room += $room[$a];
    	 if($guests > $room){
    		$rooms[$a] = ceil($guests/$room);
    		$groom = 'room[' . $a . ']'; 
    		if(fmod($guests, $room) != 0){
    		$a += 1;
    		$rooms[$a] = fmod($guests, $room);
    		$groom2 = "room[" . $a . "]"; 
    	}
    		break;
    	}
    	}
    	
    	$rm = implode($rooms);    	
    
        // Expected deep-link format: http://advertiser.ca/?city=Los%20Angeles%2C%20CA&checkInDate=20/01/2014&checkOutDate=25/01/2014&room[0]=2&room[1]=1&tracking=1423
        $url = 'http://advertiser.ca/?city=' . $city . '&checkInDate=' . $checkIn . '&checkOutDate=' . $checkOut .  '&' . $groom . '=' . $rm[0] . '&' . $groom2 . '=' . $rm[1] . $trackingID;
        return $url;

        return $url;
    }
}
