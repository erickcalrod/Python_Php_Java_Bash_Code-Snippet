<?php

date_default_timezone_set('America/Los_Angeles');

include_once('click_data.php');
include_once('deeplink.php');

use PHPUnit\Framework\TestCase;

class DeepLinkTest extends TestCase
{
    public function test_US_URL()
    {
        $clickData = $this->GenerateClickData();

        $hotelClickHandlerAdvertiserUS = new HotelClickHandlerAdvertiserUS();
        $url = $hotelClickHandlerAdvertiserUS->GetUrlUsingClickData($clickData);

        $this->assertEquals('http://advertiser.com/?city=Los%20Angeles%2C%20CA&checkInDate=01/20/2014&checkOutDate=01/25/2014&room[0]=2&room[1]=1&tracking=1423', $url);
    }

    public function test_CA_URL()
    {
        $clickData = $this->GenerateClickData();

        $hotelClickHandlerAdvertiserCA = new HotelClickHandlerAdvertiserCA();
        $url = $hotelClickHandlerAdvertiserCA->GetUrlUsingClickData($clickData);

        $this->assertEquals('http://advertiser.ca/?city=Los%20Angeles%2C%20CA&checkInDate=20/01/2014&checkOutDate=25/01/2014&room[0]=2&room[1]=1&tracking=1423', $url);
    }

    /**
     * Generate a ClickData object for use in unit tests
     *
     * @return ClickData
     */
    private function GenerateClickData()
    {
        $clickData = new ClickData();
        $clickData->city = "Los Angeles, CA";
        $clickData->checkInDate = "01/20/2014";
        $clickData->checkOutDate = "01/25/2014";
        $clickData->guests = 3;
        $clickData->rooms = 2;
        $clickData->trackingID = '&tracking=1423';

        return $clickData;
    }
}
