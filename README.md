<!-- 
# Laravel Webアプリケーション

## Overview
Have you ever experienced "I forgot to draw a celebratory illustration for that character..."? With this app, you can search and manage the birthdays of your favorite characters from over 50,000 data, and keep track of them on your calendar. Check the birthdays of your favorite characters and have more fulfilling fandom activities, social media interactions, and support for your creative work.

## URL
App URL: http://http://ec2-52-193-41-210.ap-northeast-1.compute.amazonaws.com/

## Test Account
You can test the app's features using the following test account:

* Username: testuser
* Password: testpass

## How to Use
- You can search for information such as a character's birthday, gender, and blood type by entering the date, work name, or character name in the search box on the top page.
- By registering for a simple account, you can add a character's birthday to your personal calendar as an event.

## Features
* Search function for characters
* Function to add character birthdays as events to your calendar
* Account registration and login function
* Function to display characters whose birthday falls on a selected day by clicking on the date on the calendar

## Planned Features to Implement
* Email notification function: We plan to implement a feature to notify you by email when a registered character's birthday is approaching.
* Tweet function: We plan to implement a feature to tweet the character's birthday registered in the calendar.

## Development Environment
* Laravel 9.43.0
* PHP 8.2.0
* MySQL 5.7.28
* HTML/CSS/JavaScript (Bootstrap 5.0)

## License
MIT License.  -->

# Project Name

"Character Birthday Calendar"

## Overview

Have you ever experienced "I forgot to draw a celebratory illustration for that character..."? With this app, you can search and manage the birthdays of your favorite characters from over 50,000 data, and keep track of them on your calendar. Check the birthdays of your favorite characters and have more fulfilling fandom activities, social media interactions, and support for your creative work.

## URL

App URL: http://ec2-52-193-41-210.ap-northeast-1.compute.amazonaws.com/

## Test Account

You can test the app's features using the following test account:

* Username: testuser
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

1. Clone the repository to your local machine.
2. Install dependencies using `composer install`.
3. Copy the `.env.example` file and rename it to `.env`.
4. Set up a MySQL database and update the `.env` file with your database credentials.
5. Run `php artisan key:generate` to generate a new application key.
6. Run `php artisan migrate` to create the database tables.
7. Run `php artisan db:seed` to populate the database with character data.
8. Start the development server using `php artisan serve`.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
