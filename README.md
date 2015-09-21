# nahid.co [Laravel 5.1]
This is my personal blog project develop with latest **Laravel** version **5.1**. Its opensource for students learning purpose. 

## Installation

After download or clone this project you'll see that there are no vendor directory exists in this project. Don't be worried. Laravel maintain there all packages by [composer](https://getcomposer.org/). Composer is a package dependency tools for **PHP**. so go to this project via Terminal and run this command

```
$ composer install
```

> Noted: to run this command you have to enable internet connection

Now composer will sync all packages from server.

## Configuration

If you sure all packages was downloaded then you have to configure this project. At first create a database and put your database credentials in `.env` file. `.env` is local environment file for laravel.
After saving this configuration you have to database migrate. To migrate database run this command in your terminal

```
$ php artisan migrate
```

Wow you done it.

Now your project are completely ready to learn.

## Run your project 

There are no special procedure to run this project. Go to terminal and run this

```
$ php artisan serve
```

Now your project run under `8000` port [http://localhost:8000](http://localhost:8000).

> Remember this: every time you have to run this server at `8000` port. Because our social login activate under this port 

Okay, now open this project in your browser and I think it will working fine. To login this project click login and now click 'facebook' icon and then it will automatically login. In this open source version I was integrate only facebook login.

After login this there are a single problem. You can not access Admin area. Okay its not a big deal. go to your database and click `users` table edit your user and and change user `role` to `admin` and save it.
Now logout your account from this project and re-login. 

Great, now it will work fine and you can access admin area.

Happy Coding
Thank You
**Nahid Bin Azhar**