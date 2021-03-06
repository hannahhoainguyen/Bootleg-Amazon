# CS205-Online-Store
*Jared Carlson, Chris Erkson, Hannah Nguyen and Barry Smith*

## Online shopping interface with back-end database and front-end GUI
Our project is a mock online shopping interface that contains a back-end database and front-end GUI where a user can scroll through items with pictures and prices, and select items to add to their shopping cart. The cart is then processed, and the user can see her chosen items and their total cost. The user can then check out, after which the items are deleted from the database. This app is hosted on UVM's Silk server.

## Languages:
- HTML
- CSS
- PHP
- SQL

## App location
To use this app, go to this URL: <http://bfsmith.w3.uvm.edu/StoreFront.php>.

## App usage/features

### Logging in/creating account
At the web site, if the user has a user name, she can choose the "Sign in" link at the top of the page. This brings users to a login page. For example, a visitor can choose user "starbuck" with password "boat" to log in. All the usernames and passwords are contained in a "customers" table on our database on Silk.

Users can also create a new user accounts, with the "Create a new account" link on the top of the page. This brings users to a sign-up page, and allows them to pick a username, enter a password, and double-check the password with a second entry. If satisfactory, the user is added to the database; otherwise she is sent to an error page (if the password has been incorrectly repeated).

### Front page
After logging in or successfully creating an account, users can go back to the front page and browse our wonderful selection of space-themed items for sale. If they click on any of the images of the items, a checkmark will appear. Clicking again unchecks the item. Once satisfied with their choices, users can go to the shopping cart area via the shopping cart icon.

The application stores item choices in an array that is carried around the site via PHP's `$_SESSION` array variable, which also holds other stateful information, like usernames, totals, and other variables as needed.

### Shopping Cart page
The shopping cart page shows users' item choices, along with costs and quantity purchased (currently this defaults to '1'). At the same time, a shopping cart table in the database is cleared of any old data from previous shopping carts and populated with these choices. A total cost is also calculated and presented to the user. At the bottom of the shopping cart table is a "Checkout" button. Pushing this will bring users to the "Checkout" page.

If the quantity of items in the store is zero or less, the user receives a message that these items are out of stock and that the store should be called.

### Checkout page
The items purchased by the user and the total cost are carried to the Checkout page. That cost is presented to the user, along with a thank-you message. Behind the scenes, item quantity totals in the "Quantity" table are reduced by one for each item purchased. Users can then go back to the store front page if they wish to browse or purchase more items.

### Logging Out
The front page also contains a "log out" button, which allows the users to log out. This clears the `$_SESSION` variable, so that the user is no longer held in memory.

### Where's the code?
Code that runs our site can be found in the following files (which can be seen in the URLs when using the site). These are mostly listed in order of importance (there are a number of "helper" files that work in conjunction with functions in the class).
- BootlegZon.php (the file with our one class, BootlegZon)
- StoreFront.php
- Cart.php
- Checkout.php
- style.css
- SimpleLogin.php
- CheckLogin.php
- SimpleSignUp.php
- SignUpClose.php
- BadUserPassword.php
