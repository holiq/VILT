# VILT Boilerplate

_VILT Is A Laravel Boilerplate_ provides a very flexible and extensible way of building your custom Laravel applications.

## Table of Contents

- [Features](#features)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [License](#license)

## Features
- Responsive
- Tailwin CSS
- Vue.js
- Inertia.js
- SPA (Single Page Aplication)

## System Requirements
To be able to run Laravel Boilerplate you have to meet the following requirements:
- PHP >= 7.4

## Installation
1. Clone this repository
```
$ git clone https://github.com/holiq/VILT.git
```
2. Change into the working directory
```
$ cd VILT
```
3. Copy `.env.example` to `.env` and modify according to your environment
```
$ cp .env.example .env
```
4. Install composer dependencies
```
$ composer install
```
5. An application key can be generated with the command
```
$ php artisan key:generate
```
6. Execute following commands to install other dependencies
```
$ npm install
$ npm run watch
```
7. Run migrtion to create the table
```
$ php artisan migrate
```

8. Run VILT Boilerplate
```
$ php artisan serve
or
$ php -S localhost:8000 -t public/
```
Now you can browse the site at [http://localhost:8080](http://localhost:8080)

## Bugs and Feedback

For bugs, questions and discussions please use the [GitHub Issues](https://github.com/holq/VILT/issues).

## License

This boilerplate is open-sourced software licensed under the [MIT license](LICENSE).
