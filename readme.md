# Login and registration form

## Overview

 This project focuses on integrating web applications with a MySQL database, creating a basic registration and login form using HTML and PHP, and validating forms using JavaScript.

## Objectives

- Gain familiarity with PhpMyAdmin and basic SQL commands.
- Integrate web applications with a MySQL database.
- Create a basic registration and login form using HTML and PHP.
- Implement form validation using JavaScript.

## PhpMyAdmin Setup

### Run PhpMyAdmin

1. Open XAMPP and start Apache and MySQL services.
2. Open your browser and navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. If you're using a different port for Apache (e.g., 8080), use [http://localhost:8080/phpmyadmin](http://localhost:8080/phpmyadmin).

### Create Database and Tables

1. Open the "SQL" tab in PhpMyAdmin.
2. Run the following DDL SQL query to create the database:

   ```sql
   CREATE DATABASE registration;
   ```

3. Create the "user" table using the following DDL:

   ```sql
   USE registration;
   CREATE TABLE user (
       user_id INT NOT NULL AUTO_INCREMENT,
       email VARCHAR(225) NOT NULL,
       name VARCHAR(225) NOT NULL,
       password VARCHAR(225) NOT NULL,
       registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       PRIMARY KEY (user_id)
   );
   ```

4. Check that your table is created correctly.

## Web Application Development

1. Create a web page for registration and login.
2. Implement client-side validation using JavaScript.
   - Ensure email and password are not empty for login.
   - Ensure username, email, password, and confirm password are not empty for registration.
   - Validate email uniqueness during registration.
   - Ensure password and confirm password fields match.

3. Implement server-side PHP code to connect to the MySQL database:
   - For login, run a query to select user data by the provided email and password.
   - For registration, run a query to insert a new record into the "user" table.

4. Display appropriate messages after form submission:
   - Display "Welcome {Name}" for successful submission.
   - Redirect to the same page with error messages for invalid or empty inputs.

## Bonus Features

- Validate email format.
- Save encrypted MD5 password.
- Use CSS to format the forms.

