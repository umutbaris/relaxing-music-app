# Relaxing-Music-App


**Technologies used**
- Docker
- PHP 7.2
- Laravel Framework 5.8.24
- React 16.11.0
- Nginx 

## Installation


* 1 Clone The Repository 

  `git clone https://github.com/umutbaris/relaxing-music-app`
* 2  Create .env in backend and copy content from .env-example

* 3 Actually this pard automized with docker but  if there is a problem about vendor please go to backend folder and run composer install

	`cd backend`

	
	`composer install`

* 4 Build images and run the project

  First build image 

   `docker-compose build`

  Then compose up

    `docker-compose up`

* 5 If there is a problem about laravel enter the container
  `docker exec -it fpm bash`

  Then cache clear

    `php artisan config:cache`
    
* Also you can view postman collection with this url 
https://www.getpostman.com/collections/b4f676e99c41d01c5dd6
