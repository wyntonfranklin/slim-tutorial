# Slim Tutorial

This is a simple todo application made using the Slim framework.  Slim is a PHP micro framework that helps you quickly write simple yet powerful web applications and APIs.

You can learn more about slim here - https://www.slimframework.com/

You see the walk-through here - https://wftutorials.wordpress.com/. It outlines how I went about building this application.

This tutorial was built from the slim-skeleton application and was built for Composer. This makes setting up a new Slim Framework application quick and easy.

### Preview

![https://wftutorials.files.wordpress.com/2018/12/slim_tutorial_screenshot_1.png](https://wftutorials.files.wordpress.com/2018/12/slim_tutorial_screenshot_1.png)

## Install the Application

Clone  or Download the application to your desktop.

`git clone https://github.com/wyntonfranklin/slim-tutorial.git`

Run this command from the directory in which you want to install the tutorial. This will download all the composer dependencies.

    php composer.phar install

You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

## Features

- Create a new task
- Edit a task
- Delete a task
- View a task
- View all task
- Create a quick task via ajax
- Delete a task via ajax
- Create views using twig
- Create routes using controllers
- Using the slim dependency container
- Using a database
- Login  and Authentication  - Pending



## Resources

Bootstrap Template - https://github.com/BlackrockDigital/startbootstrap-scrolling-nav

