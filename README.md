# teletwitter

http://www.teletwitter.de

Website to use Twitter in Teletext style. No data is storred permanently on the server. All Twitter user tokens are kept in $_SESSION variables which will be deleted automatically after a timeout. Due to this, the users might need to re sign in when they come back another time, but it keeps the (personal) data storred to a minimum (= nothing). If no data is collected, the risk to lose any data is non existing. Due to this and to very restrictive timeouts I've set on my server, you'll get the message "Twitter token got invalid, please sign in again" when waiting to long. This could be avoided by saving the tokens and placing them via cookie on the users computer, but this is nothing I intend to implement.

# supported function

sign in
sign out
read timeline
read notifications
read single tweets
like and unlike tweets
retweet and undo retweet
follow and unfollow users
secret joke pages 
contact information

# prerequisits

In order to run Teletwitter on your own server, you need a Webserver running PHP. 
(MySQL or other databases are not required)

# installation instructions

1. get API keys from developer.twitter.com
(this might be the hardest part, as they are quit restrictive nowadays)

2. copy all files to a server

3. add the callback URL on developer.twitter.com to point to the index.php file on your server

4. add your AIP keys to inc/twitter_tokens.php

5. there is no step 5
