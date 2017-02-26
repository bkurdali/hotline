# Hotline

Hotline is a phone bank hotline and mass texting tool that uses Twilio.

## Requirements

- PHP (7.0 used, earlier versions may work).  Uses mysqli to interface with MySQL.
- MySQL (5.7 used, earlier versions may work)
- a Twilio account

## Installation

1. Download or git clone this project
2. Password protect access to the directory you installed it to.  HTTP basic security should work.
3. Install a database editing utility such as PhpMyAdmin and place it in the "sanctdb" directory under the main directory.
4. Create a database and credentials to access it using this utility or directly via the command line using mysql.
5. Edit the "config.php" file:

The $TWILIO_ACCOUNT_SID and $TWILIO_AUTH_TOKEN can be found from 
the [Twilio Account Dashboard] (https://www.twilio.com/user/account).

Put the database credentials in the $HOTLINE_DB_ settings.

For mass texting, set the $BROADCAST_ settings including the phone number to use in the '+1NXXNXXXXXX' 
format ($BROADCAST_CALLER_ID).

For a hotline, set the $HOTLINE_ settings including the phone number to use in the '+1NXXNXXXXXX' 
format ($HOTLINE_CALLER_ID).

6. In your Twilio account, configure each number to make a webhook request to the application.  Use the 
HTTP basic security you set above (replace username and password and the web address below as appropriate).  
For voice, use:

https://username:password@(web address, example: hotline.hotline.org)/twin/incoming-voice.php

For messaging (SMS), use:

https://username:password@(web address, example: hotline.hotline.org)/twin/incoming-sms-php

7. Optional.  To enable in-browser outbound calling, create a TwiML app (under Phone numbers, Tools) 
with a voice request URL of:

https://username:password@(web address, example: hotline.hotline.org)/call/voice.php

Once you've created the TwiML app, copy its SID and set the $TWILIO_TWIML_APP_SID setting in config.php to it.
