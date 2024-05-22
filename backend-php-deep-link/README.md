# Clicktripz Backend Unit Test
A core Clicktripz product is an advertisement widget that allows users to enter their travel plans. After clicking a 'Check Rates' button, the user is forwarded to an advertiser website displaying the results of their search.

Forwarding the user requires the generation of a deep-link. We define this as a link which sends a user deeper than the front page. Most commonly the link will display tickets or hotels based on the user's search criteria.

Your mission, should you choose to accept it, is to make a deep-link for an imaginary advertiser. A unit test has been created to validate whether the deep-link is correct. You can run this test via the following command (note that you will need to install [docker](http://www.docker.com/)):
```bash
docker run -v $(pwd):/app --rm phpunit/phpunit deeplink_test.php
```

After the tests are executed, a summary containing two test failures will be printed. It should end with:
```
FAILURES!
Tests: 2, Assertions: 2, Failures: 2.
```

To make the unit tests pass, please implement the `HotelClickHandlerAdvertiserUS` and `HotelClickHandlerAdvertiserCA` classes in deeplink.php.

A passing test will end with:
```
OK (2 tests, 2 assertions)
```

When you are satisfied with your updates, please submit a copy of your code to jobs@clicktripz.com.

## A few notes and hints

1. There are two tests. The first tests a United States formatted deep-link, the second tests a Canadian formatted deep-link. This causes two differences. The first is the `http://advertiser.com` and `http://advertiser.ca` difference. The second is the date format. The United States format is `MM/DD/YYYY`, the Canadian is `DD/MM/YYYY`. 
   
   Here are the expected urls for comparison:
   ```
   http://advertiser.com/?city=Los%20Angeles%2C%20CA&checkInDate=01/20/2014&checkOutDate=01/25/2014&room[0]=2&room[1]=1&tracking=1423
   http://advertiser.ca/?city=Los%20Angeles%2C%20CA&checkInDate=20/01/2014&checkOutDate=25/01/2014&room[0]=2&room[1]=1&tracking=1423
   ```

2. Examine the following part of the url: `&room[0]=2&room[1]=1`. This tells the advertiser there are two people in the first room, and one person in the second room.

3. The `ClickData` object is defined in click_data.php.

4. You can do anything you want to pass the unit test, except alter the test itself to auto pass. However, you'll want to start in deeplink.php

5. If you have any questions, feel free to contact jobs@clicktripz.com and we'll get back to you as soon as we can.

