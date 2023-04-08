# Project Name

"Rememo"

## Overview

This is an application that allows you to search and manage the birthdays of your favorite characters from a database of over 50,000 characters, and keep track of them on your calendar. With this app, you can enjoy more fulfilling fandom activities, social media interactions, and support for your creative work by never forgetting a character's birthday again.

## URL

App URL: http://ec2-52-193-41-210.ap-northeast-1.compute.amazonaws.com/

## Test Account

You can test the app's features using the following test account:

* Username: testuser
* Email: testuser@examle.com
* Password: testpass

## How to Use

- Visit the website and enter the date, work name, or character name in the search box on the top page.
- You can search for information such as a character's birthday, gender, and blood type.
- By registering for a simple account, you can add a character's birthday to your personal calendar as an event.

## Development Environment

* Laravel 9.43.0
* PHP 8.2.0
* MySQL 5.7.28
* HTML/CSS/JavaScript (Bootstrap 5.0)

## Features

* Search for character birthdays from a database of over 50,000 characters
* View character information such as gender and blood type
* Register for a simple account to add character birthdays to your personal calendar
* Responsive design using Bootstrap 5.0

## Getting Started

1. Ensure that your system meets the requirements of the application, such as Laravel 9.43.0, PHP 8.2.0, and MySQL 5.7.28.
2. Clone the repository to your local machine.
3. Install dependencies using composer install.
4. Copy the .env.example file and rename it to .env.
5. Set up a MySQL database and update the .env file with your database credentials.
6. Run php artisan key:generate to generate a new application key.
7. Run php artisan migrate to create the database tables.
8. Run php artisan db:seed to populate the database with character data.
9. Start the development server using php artisan serve.
10. Visit the website

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
