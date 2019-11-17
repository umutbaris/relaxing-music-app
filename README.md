# Relaxing-Music-App

"In Process"

[Video Link From Drive ](https://drive.google.com/file/d/1Wc6Zg-yfzRtr3yS9Tw9tgo2IOh2XE456/view?usp=sharing)

**Technologies used**
- Docker
- PHP 7.2
- Laravel Framework 5.8.24
- React 16.11.0
- Nginx 

## Installation

\## Installation

* 1 Clone The Repository 

  `git clone https://github.com/umutbaris/relaxing-music-app`
* 2  Create .env in backend and copy content from .env-example

* 3 Actually this pard automized with docker but  if there is a problem about vendor please go to backend folder and run composer install

	`cd backend`

	`composer install`

* 4 Build images and run the project

 - First build image 

   `docker-compose build`

 - Then compose up

    `docker-compose up`

- 5 If there is a problem about laravel enter the container
  `docker exec -it fpm bash`

 - Then cache clear

    `php artisan config:cache`

 ## Api Endpoints

* 1 Clone The Repository 

  `git clone https://gitlab.com/umutbariskarasar/mercedes-challenge.git`

* 2 If there is a problem about vendor please go to backend folder and run composer install
  `cd backend`
  `composer install`


* 3 Build images and run the project
 - First build image 
`docker-compose build`
 - Then compose up
 `docker-compose up`



 ## Api Endpoints

| Method | URL                         |
| -------|-----------------------------|
| GET    | api/vehicles/               |
| GET    | api/vehicles/{id}/          |
| GET    | api/vehicles/{id}/position/ |
| GET    | api/vehicles/{id}/fuellevel/|
| GET    | api/vehicles/{id}/doors/    |
| POST   | api/vehicles/{id}/doors/    |
| GET    | api/login/                  |
| GET    | api/authorization/          |

* Also you can view postman collection with this url 
https://www.getpostman.com/collections/b4f676e99c41d01c5dd6