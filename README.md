

# Random XKCD Comic Sender






## Description
It is an PHP application that accepts a visitor's email address and email them random XKCD comics every five minutes.

## How it works
In this the user have to click on demo link provided below, then the user will enter her/his email id after that the user will receive a confirmation link on their email address to confirm their email address.

After confirming email address the user will start receiving Random XKCD comics every five minutes on their email address.

If the user want to stop receiving comics then she/he will have to click on unsubscribe option provided in their email address.

Note: If the user accidentally clicks on unsubscribe option or wants to receive XKCD comics again then the user will have to click on  Subscribe again option.

## Demo Link 
You can take the live demo here:

https://xkcd-image.herokuapp.com/

## Description about each file

Index.php => This is the index file of the project, this file contains form to accept email address of visitors.

Sign_account.php => This file contains the code to send email to visitors email address. 

I use sendgrid email sending service to send mail with php curl.

Confirmation.php => This file contains the code to send confirmation link to visitors to verify their email address.

send_comic.php => This file contains the code that fetch random xkcd comics and put that comics in RTCAMP.png file and send that random comics with attachment as well as unsubscribe link(unsubscribe.php) to every registered user.

Unsubscribe.php => This file contains the code that helps user to unsubscribe their email address.

Subs_again.php => This file contains the code that helps user to subscribe again their email address.

Database.php => This file contains the code to connect to the database but in this file i mentioned fake credentials to avoid git leaks, you can use your database credentials for database connectivity.

Demolink.php => This file contains the demo link.

gitignore => There are two more files which i mentioned in other files by using 'require file' 

1) send1.php => This file contains sendgrid API key.

2) username.php => This file contains username or email address from which email is being sent.

## Services Used

Email Sending Service => Sendgrid 

Remote Database Service => freemysqlhosting.net

Hosting => Heroku 

Cron Job Service = https://console.cron-job.org/






