### Description:
- Adds a list to mailchimp
- Adds a user to mailchimp list
- Updates user in mailchimp list

### Configuration
- Change the api key in config/config.php (the $api_key attribute)

###Usage instructions:
- php manage.php

### Test execution:
- Individual tests (e.g): vendor/phpunit/phpunit/phpunit tests/config/ConfigTest.php
- Test suite (all tests): vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests

### TODO:
- Update __set and __get to use composition from a central magic method object.
- Fix bug where first list doesn't have subscriber added to it

### Notes:
- I'd like to have made a collection of lists and a collection of members driven by the database.
- I've just set it to 1 object of each type for now to simulate addition/manipulation of one list and one user.
- I'd have liked to create mock objects so I can test the MailList object more thoroughly, but haven't gotten around to it.
- Need to more robust testing around singletons, ensuring we're only updating the 1 object and always getting the same instance.