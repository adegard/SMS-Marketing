# SMS-Marketing
Php rest api to send SMS 


# Installation:

1. create an account on https://www.skebby.it/
2. associate your phone number (sender) in skebby platform
3. Download the two PHP files from this Repository
4. Update Skebby credentials (username and password, used for login) in sendsmsapi.php in rows 37, 38
5. Create your "secret APIKEY" code  in sendsmsapi.php in rows 8
6. Upload the 2 files on your server.

# How to use it

Send SMS just calling Rest API like this:

https://***serverfolder***/sendsmsapi.php?APIKEY=***YOURAPIKEY***&SENDNAME=***NAME***&TEL=***NUMBER***
i.e. :

https://www.mysite.com/sendsmsapi.php?APIKEY=FDSJHFDI7438JJJHK&SENDNAME=Paul&TEL=3901228756

Enjoy!

# Contribution
http://simplestipsandtricks.blogspot.com/

# How to use it with RPA (Robotic Process Automation)

you can use it in association with Tagui automation to create marketing automation sequences.
See an example in this post:http://simplestipsandtricks.blogspot.com/2018/07/auto-responder-bot-for-subitoit-or.html
