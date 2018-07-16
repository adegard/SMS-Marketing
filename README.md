# SMS-Marketing
Php rest api to send SMS 


# Installation:

1. create an account on https://www.skebby.it/
2. associate your phone number ("tel") in skebby platform
Download the two PHP files 
3. Update Skebby credentials (username and password, used for login) in sendsmsapi.php in rows 37, 38
4. Create your "secret APIKEY" code  in sendsmsapi.php in rows 8
5. Upload on your server.

# How to use it

Send SMS just calling Rest API like this:

https://***serverfolder***/sendsmsapi.php?APIKEY=***YOURAPIKEY***&SENDNAME=***NAME***&TEL=***NUMBER***
i.e. :

https://www.mysite.com/sendsmsapi.php?APIKEY=FDSJHFDI7438JJJHK&SENDNAME=Paul&TEL=3901228756

Enjoy!


PS: you can use it in association with Tagui automation to create marketing automation sequences.
