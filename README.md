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
* 1 Clone The Repository 

  `git clone https://gitlab.com/umutbariskarasar/mercedes-challenge.git`

* 2 Docker Compose With Building Image From GitLab Container Registry

  `docker-compose -f docker-compose-prod.yml up`

* 3 This part is alternative solution if  builded image does not work correctly
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