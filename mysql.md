# MYSQL GENERAL

## LOGGING IN TO DBASE ON CL (HERE, UVM'S SILK SERVER)
-bash-4.2$ mysql -u bfsmith_reader -p

## CREATE DATABASE
mysql> CREATE DATABASE mydomain;
Query OK, 1 row affected (0.00 sec)

## USE DATABASE
mysql> USE mydomain;
Database changed

## CREATE TABLE
mysql> CREATE TABLE pet (name VARCHAR(20), owner VARCHAR(20), species VARCHAR(20), sex CHAR(1), birth DATE, death DATE);
Query OK, 0 rows affected (0.01 sec)

## ADD COLUMN
ALTER TABLE vendors
ADD COLUMN vendor_group INT NOT NULL;

## INSERT DATA INTO TABLE
mysql> INSERT INTO pet VALUES ('Puffball','Diane','hamster','f','1999-03-30',NULL);
Query OK, 1 row affected (0.00 sec)

mysql> INSERT INTO pet VALUES ('Libby','Diane','dog','f','2001-04-15',NULL);
Query OK, 1 row affected (0.00 sec)

## SELECT STATEMENT
mysql> SELECT * FROM pet;
````
+----------+-------+---------+------+------------+-------+
| name     | owner | species | sex  | birth      | death |
+----------+-------+---------+------+------------+-------+
| Puffball | Diane | hamster | f    | 1999-03-30 | NULL  |
| Libby    | Diane | dog     | f    | 2001-04-15 | NULL  |
+----------+-------+---------+------+------------+-------+
2 rows in set (0.00 sec)
````

## QUIT
mysql> quit
Bye

## DELETING A ROW
mysql> DELETE FROM merchandise where itemno = 4;

## UPDATING A FIELD
mysql> update MERCHANDISE SET COST = '489000002237' WHERE ITEMNO = 3;
<http://www.mysqltutorial.org/mysql-update-data.aspx>

## SHOW SCHEMA
desc name-of-your-table;

## COPY A DATABASE
<http://www.mysqltutorial.org/mysql-copy-database/>
Basically, you just make a new database within mysql, and then run the following commands:
/Applications/MAMP/Library/bin/mysqldump  -uroot -proot store > ~/cs205/final-project/store.sql
/Applications/MAMP/Library/bin/mysql  -uroot -proot test_store < ~/cs205/final-project/store.sql

## SOME LINUX-SPECIFIC INSX (DEBIAN)
Start mysql:
/etc/init.d/mysql start

Log in:
mysql -u root -p

If you forget the root password:

mysqld --skip-grant-tables --user=root

Go back into MySQL with the client:
````
[root@host root]# mysql
Welcome to the MySQL monitor.  Commands end with ; or g.
Your MySQL connection id is 1 to server version: 3.23.41
Type 'help;' or 'h' for help. Type 'c' to clear the buffer.
mysql> USE mysql
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A
Database changed
mysql> UPDATE user
-> SET password=password("newpassword")
-> WHERE user="root";
Query OK, 2 rows affected (0.04 sec)
Rows matched: 2  Changed: 2  Warnings: 0
mysql> flush privileges;
Query OK, 0 rows affected (0.01 sec)
mysql> exit;
[root@host root]#killall mysqld
````
(From page http://www.netadmintools.com/art90.html)

------------------------------------------------------------
Resetting a password:

From Unix:
 ```
	shell> mysql -u username -h hostname -p password
	mysql> SET PASSWORD FOR username@localhost=PASSWORD('new_password');
```

Add a user with full privileges:
````
USE mysql;
	mysql> GRANT ALL PRIVILEGES ON *.* TO myUser@localhost
               IDENTIFIED BY 'pass' WITH GRANT OPTION;
	mysql> GRANT ALL PRIVILEGES ON *.* TO myUser@"%"
               IDENTIFIED BY 'some_pass' WITH GRANT OPTION;

This is for: A full superuser who can connect to the server from anywhere, but who must use a password 'pass' to do so. GRANT statements should be for both myUser@localhost and myUser@"%". to prevent the anonymous user entry for localhost take precedence.
````
(From <http://www-css.fnal.gov/dsg/external/freeware/mysqlAdmin.html>)

For root - can try: SET password=password("password")
or can try: UPDATE user SET password=password("password") WHERE
user="root";
