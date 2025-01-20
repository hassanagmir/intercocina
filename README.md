<p align="center">
    <a href="https://intercocina.com" target="_blank">
        <img src="[https://intercocina.com/wp-content/uploads/2023/09/cropped-COPIE-184x87.png](https://intercocina.com/assets/imgs/intercocina-logo.png)\" width="400" alt="Inter Cocina Logo">
    </a>
</p>
<h1 style="font-size: 48px; text-align: center; color: #ff0000;">INTERCOCINA</h1>
<p align="center">

[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/digiton-ma/bazzma/pint.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/digiton-ma/bazzma/actions?query=workflow%3A"pint"+branch%3Amaster)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/digiton-ma/bazzma/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/digiton-ma/bazzma/actions?query=workflow%3Arun-tests+branch%3Amain)

</p>


## About the app
this a vehicle selling platform, where clients can contact the company 
and the company sells their cars through it's distribution network.

## Requirements

// ---

## Installation

1- Install the necessary packages
```bash
$ composer install
```

2- Copy the `.env.example` file to `.env`
```bash
$ cp .env.example .env
```

3- Generate the application key
```bash
$ php artisan key:generate
```

4- Configure you `database` information

5- run the migrations
```bash 
$ php artisan migrate --seed
```
or
```bash 
$ php artisan migrate:fresh --seed
```
6- Link your storage folder
```bash
$ php artisan storage:link
```

7- Install the necessary node packages
```bash
$ npm install
```

8- Build the assets
```bash
$ npm run build
```

9- Serve the application
```bash
$ php artisan serve
```

#### All the commands
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
npm install
npm run build
php artisan migrate --seed
php artisan serve
```
