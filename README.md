# whatdoyouwant
website : www.whatdouwant.club


What Do U Want Developer Documentation


Hardware Requirements:
A computer with internet connection.


Software Requirements:
A text editor to write code
Xampp (Provides Localhost Server and Database management system)



Steps:
Setting up XAMPP
Go to https://www.apachefriends.org/download.html  and download the latest version of XAMPP (PHP 7) compatible to your system.
Once downloaded, go to https://premium.wpmudev.org/blog/setting-up-xampp/?wpcv=b&utm_expid=3606929-93.spVh-aR3SwGklKzL4HJQQg.1&utm_referrer=https%3A%2F%2Fwww.google.com%2F  
and follow the installation instructions of XAMPP exactly.

Start the Apache and MySQL server, service column should turn green. If you get error messages, do not fear, some ports just need to be freed. Google how to do this.

After started click on the apache admin button. This should take you to localhost webpage. Also do the same for the MySQL module, this should take you to phpmyadmin.

If you see these pages, congratulations you’ve set-up XAMPP successfully.


Setting up MySQL Database:

Go to GitHub and clone this repo https://github.com/ECE373-Fall16/whatdoyouwant.git 
The only folder you will be needing is WDYW which is in the V1.0 folder, DON’T tamper with the remaining folders.
Open the XAMPP control panel, and start mysql and click on admin. This should take you to phpmyadmin.

Create a new DB, call it “helloworld”
Once created, it’s going to be blank, look for the import button and import the file called “helloworld.sql” in the WDYW folder.

After importing, database tables with various structures should have been created.


Setting up the WDYW on localhost
Open the XAMPP control panel, and start Apache.

Find the XAMPP folder on your machine and access it, it’s most likely in C:\Program Files\XAMPP. If it’s not there, it’s somewhere in your C drive

In the XAMPP folder look for “htdocs” folder and access it.

Paste downloaded WDYW folder in there.

Open a browser, type localhost/WDYW
The website with the login page should show!


Modifying code
All the written php code are stored in the WDYW folder.

Any changes done would take effect when run on the localhost.

Editing code just requires a text editor, preferably sublime text.
