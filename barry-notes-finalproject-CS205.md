# FINAL PROJECT - CS205

## WEB APP IDEA
From project description:
Deliverable I: Project proposal
This describes the project your team will do and says what language(s) you will use. Due Friday, March 8th, 11:59pm

We intend to do a Web app, a front-end that will do a kind of LAMP/MAMP stack working with one of the databases from the warmup project (or something similar).
- We'll create a GUI front end that will allow the user to find similar information.
- We'll use Javascript/CSS for the front end, PHP for the back end, and some kind of SQL (probably MYSQL) for the database.
- We'll likely host this on silk

## EMAIL FROM JIM EDDY RE: SILK
Hi Barry,
Good to hear from you! Check this out: https://silk.uvm.edu/manual/

Jim

## USEFUL LINKS
<https://stackoverflow.com/questions/3635166/how-to-import-csv-file-to-mysql-table>

## SESSION ON SILK

finn:~ bfsmith9$ ssh bfsmith@w3.uvm.edu
bfsmith@w3.uvm.edu's password:
Last login: Mon Mar 11 22:07:48 2019 from silk-gw1.uvm.edu
This is a second generation UVM silk hosting server.
For more information, see https://silk.uvm.edu/manual.
-bash-4.2$ mysql
ERROR 1045 (28000): Access denied for user 'bfsmith'@'silk21.uvm.edu' (using password: NO)
-bash-4.2$ mysql -u bfsmith_reader -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MySQL connection id is 62997094
Server version: 5.6.39-83.1-log Percona Server (GPL), Release 83.1, Revision da5a1c2923f

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MySQL [(none)]> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| BFSMITH_STORE      |
| common_schema      |
+--------------------+
3 rows in set (0.20 sec)

MySQL [(none)]> USE BFSMITH_STORE;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MySQL [BFSMITH_STORE]> show tables;
+-------------------------+
| Tables_in_BFSMITH_STORE |
+-------------------------+
| customers               |
+-------------------------+
1 row in set (0.00 sec)

MySQL [BFSMITH_STORE]> select * from customers;
+------+--------+--------+
| id   | name   | passwd |
+------+--------+--------+
|    1 | Chris  | passc  |
|    2 | Hannah | passh  |
|    3 | Jared  | passj  |
|    4 | Barry  | passb  |
+------+--------+--------+
4 rows in set (0.00 sec)

MySQL [BFSMITH_STORE]>

## TO-DO: CODE-SPECIFIC
- [x] Change GET to POST if you can
- [x] Get code on GitHub
- [x] Try OOP paradigm
- [x] Finish up dbase on silk
- [x] Upload new code to silk; try it
- [ ] Find a way to add and delete rows from GUI
- [ ] Find a way to modify data in cols/rows from GUI
- [ ] Find a way to have a cart
- [ ] How would we do search? Select * from table where item like '%something'? Figure out.
- [ ] Will you be able to have an entirely separate cart function?
- [x] Change name of LoginArea to something more generic?
- [x] Make sure we really have "RESTful API" - not familiar enough with definition (yes, I think we're good - more in notes below). <https://restfulapi.net/>
<https://stackoverflow.com/questions/551933/can-you-explain-the-web-concept-of-restful>
- [ ] Need to switch around the order of the pages on the site - i.e., you'll start by logging into the "merchandise" page, and the login will be something you access from the top.
- [ ] See if you can resize pix w/ a command. Search resize php base64_encode. See https://stackoverflow.com/questions/50775658/resize-or-crop-base64-images-using-php
- Checkboxes coding. Could have a separate function, invoked from the cart (?) Need some kind of "for each" - for each "name" in the list, if checkbox, show it, subtract it... Might be able to just use `$_POST` - does it carry across web pages? For some reason cart stopped working on 4/11/19. OK - because I was learning how to log in users, I erased some code. Fixed - the cart happened relatively early in the process, when I knew less about what I was doing.
    - Search multiple checkboxes html how to save
    - You can save values in some kind of array - see links below
    - <https://stackoverflow.com/questions/13962718/how-to-save-multiple-checkboxes-in-one-string>
    - <https://www.formget.com/php-checkbox/>
## QUESTIONS
- How do we implement a cart? Just use another dbase table? Maybe something like in a separate table, where each user (they could have a particular ID) could have a record of what they want to purchase.
- Another way - using a PHP SESSION array variable. <https://www.w3schools.com/php/php_sessions.asp>
- Here's a way that doesn't use sessions: <https://www.codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html>
- These all seem very complex - like something you'd do on a job. How simple can I make it?
    - Need a way users can choose something. Maybe a check box/radio button? (Just one at a time.) Then just find a way to save the ID of that choice. Multiple check boxes - then run a foreach over the listing of items: checkbox = yes or no. Just search php checkbox. <https://stackoverflow.com/questions/4554758/how-to-read-if-a-checkbox-is-checked-in-php>

## MY OWN CART IDEAS
- Have a radio button on the items package for each rows.
- Have a button in the row: "Add to shopping cart.
- Have an indicator showing added - color, something
- (Could have a box that allows you to pick some number of items)
- Have a "go to shopping cart" button/links
- Display what has been chosen
- If confirmed, delete items from dbase and tot up prices
    - Don't necessarily have to allow more than one item to get purchased - could make that a "nice to have."
    - If I were to do that, I could have some kind of form button, added to the row. Whatever number the customer puts in, I could save that in a session var. When I get to the cart, just subtract it from the total. (If it's too much - I need some place to make comparisons...where to do that?)
    - Pseudocode: if checkbox is selected, desired amount is whatever is in the numeric input box.
- Present a confirmation page: "x has been purchased"
- If one navigates back to listings, there should be one fewer of purchased items.
    - What if zero items? Should you have another table with items that need to be stocked?

## PASSING VARIABLES BETWEEN PAGES
Search php variables "across pages". I'm starting to get that to work with sessions - need to read more about them. How do I drop them?

## PASSING OBJECT BETWEEN PAGES
When I pass the object variable between pages, depending on where I am I may need to switch the table - i.e., go from customers to merchandise. I can either try to do that, or have an extra property, like customerTable (and therefore merchTable).

## PROBLEM WITH FORM ACTION
When I try to sign in on the SimpleLogin page, it just skips over the if-statement, going directly to the storefront, without going through connDB. How do I get to go through connDB? Do I need to make it jump to yet another page? Or can I simply give it a function name as an action? (Think I need to do the former.)

## WORKING WITH CHECKBOXES
- Looks like I should be giving each checkbox a checkbox *name*, and from that I should be able to choose an item.
- Links:
    - <https://www.sitepoint.com/community/t/how-to-insert-checkbox-value-to-database/3625>
- Problems: for some reason, there were extra dots, periods, in the ID values in rows in the MERCH table when I fetched them. They were *not* in the table itself - it has something to do w/ the PHP or the way I fetched them. When I stripped them out, things started working. This probably cost me an hour or more, since I was searching for an ID like ".24 ." instead of "24".

## SUBTRACT FROM A MYSQL FIELD
<https://stackoverflow.com/questions/5383108/update-a-column-by-subtracting-a-value>

## SOME KIND OF "GALLERY" LAYOUT
Look at this: <https://www.w3schools.com/css/tryit.asp?filename=trycss_image_gallery_responsive>. Could do something like the following, using a similar "while" or "foreach" like you're doing now. Essentially the idea is "for each" row in merchandise, print out its name, price, and the link to its picture, which will be located in the images/ directory in the same space.
```
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_5terre.jpg">
      <img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_forest.jpg">
      <img src="img_forest.jpg" alt="Forest" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>
```

## CHRIS'S CODE TO ADD USERS
INSERT INTO `customers` (`id`, `name`, `passwd`) VALUES (NULL, ’X', ‘Y’);
** Change X and Y to user inputed name and password respectively

## NOTES

### What is REST?
From: <http://rest.elkstein.org/>
REST stands for Representational State Transfer. (It is sometimes spelled "ReST".) It relies on a stateless, client-server, cacheable communications protocol -- and in virtually all cases, the HTTP protocol is used.

REST is an architecture style for designing networked applications. The idea is that, rather than using complex mechanisms such as CORBA, RPC or SOAP to connect between machines, simple HTTP is used to make calls between machines.

- In many ways, the World Wide Web itself, based on HTTP, can be viewed as a REST-based architecture.

RESTful applications use HTTP requests to post data (create and/or update), read data (e.g., make queries), and delete data. Thus, REST uses HTTP for all four CRUD (Create/Read/Update/Delete) operations.

REST is a lightweight alternative to mechanisms like RPC (Remote Procedure Calls) and Web Services (SOAP, WSDL, et al.). Later, we will see how much more simple REST is.

- Despite being simple, REST is fully-featured; there's basically nothing you can do in Web Services that can't be done with a RESTful architecture.

REST is not a "standard". There will never be a W3C recommendation for REST, for example. And while there are REST programming frameworks, working with REST is so simple that you can often "roll your own" with standard library features in languages like Perl, Java, or C#.

## MISC URLS
<http://bfsmith.w3.uvm.edu/hello.php>

<https://www.php-fig.org/psr/psr-1/>

<https://developer.mozilla.org/en-US/docs/Learn/HTML/Forms/>

#### How_to_structure_an_HTML_form
<https://css-tricks.com/php-for-beginners-building-your-first-simple-cms/>

<https://duckduckgo.com/?q=how+to+form+action+all+in+same+file+php&t=ffab&ia=web>

<https://stackoverflow.com/questions/15130493/php-form-using-the-same-page-after-submittion>

<https://stackoverflow.com/questions/23726379/html-form-and-php-function-on-same-file>

<https://duckduckgo.com/?q=isset+post+php&t=ffab&ia=web>

<https://stackoverflow.com/questions/13045279/if-isset-post>

<https://secure.php.net/manual/en/language.oop5.basic.php>

#### CSS image grid links, etc.
- Search css layout image placement

<https://medium.freecodecamp.org/how-to-create-an-image-gallery-with-css-grid-e0f0fd666a5c>

<https://internetingishard.com/html-and-css/advanced-positioning/>

*This one looks useful* <https://www.w3schools.com/css/css3_images.asp>

<https://stackoverflow.com/questions/51006001/css-grid-image-gallery-how-to-resize-all-images-to-be-the-same-size-and-maintai>
