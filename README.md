# Sign-Up
This is a sign up page that you can add to any web page. It is mobile responsive and I made sure to keep to HTML and 
CSS easy to change for your needs.

![Image of SignUp](https://github.com/ecombee28/Sign-Up/blob/master/signUp/images/Screen%20Shot%202019-05-04%20at%204.55.18%20PM.png)

# How to Use
* The signup page has three main fields username, email, and password. When the username field is out of focus it makes an
ajax call to the database to see if the username is available for use. If it is not available a warning will appear letting the user know and if the username is available for use a green check mark will appear.
* The email field works just like the username field but it also checks to see if the email that the user inputs are a real email. 
* The password field checks for 3 parameters uppercase letter, lower case letter, number, and an input length of 7. Once these have been filled you will get a green check mark.
* Once all 3 parameters are meet then the submit button will be ready to use.
* Once the username, email, and password have been submitted an email will be sent to newly signed up user. This email can be found on the submit.php page and can be changed to your own needs.
* [Demo](https://combeecreations.com/signUp/)

# What I learned
I learned a great deal of Javascript while designing this page and sharpened up my HTML and CSS skills. I also learned about the PHP mail function and all that it has to offer.
