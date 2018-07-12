<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

## use docker

```bash
$ docker-compose build 
$ docker-compose config --services
  mysql
  php7.1.18
$ docker-compose run -v `pwd`:/app php7.1.18 composer install
$ docker-compose run -v `pwd`:/app php7.1.18 php ./init --env=Development
$ docker-compose up
$ docker-compose exec php7.1.18 php ./yii migrate
```

[visit localhost](http://localhost:8895/index.php?r=site%2Flogin)

    mysql will expose 3306


## docs
```bash
docker-compose run -v `pwd`:/app php7.1.18 ./vendor/bin/apidoc api vendor/yiisoft,frontend,common,backend --interactive=0 output
docker-compose run -v `pwd`:/app php7.1.18 ./vendor/bin/apidoc guide docs --interactive=0 output/guide
```

## add extension
```bash
docker-compose run -v `pwd`:/app php7.1.18 composer require --prefer-dist yiisoft/yii2-mongodb
```


```bash
[amtf@amtf-s3 yii2-advanced-docker]$ docker-compose ps
                Name                              Command               State            Ports          
--------------------------------------------------------------------------------------------------------
yii2-advanced-docker_mongo-express_1   tini -- node app                 Up      0.0.0.0:8081->8081/tcp  
yii2-advanced-docker_mongo_1           docker-entrypoint.sh mongod      Up      0.0.0.0:27017->27017/tcp
yii2-advanced-docker_mysql_1           docker-entrypoint.sh mysqld      Up      0.0.0.0:3306->3306/tcp  
yii2-advanced-docker_php7.1.18_1       php ./yii serve 0.0.0.0:80 ...   Up      0.0.0.0:8895->8080/tcp  
[amtf@amtf-s3 yii2-advanced-docker]$ docker-compose images
             Container                           Repository              Tag       Image Id      Size 
------------------------------------------------------------------------------------------------------
yii2-advanced-docker_mongo-express_1   mongo-express                    latest   1931396fb5aa   196 MB
yii2-advanced-docker_mongo_1           mongo                            latest   91a642e82a2a   361 MB
yii2-advanced-docker_mysql_1           mysql                            5.7      1aea6b9b341e   355 MB
yii2-advanced-docker_php7.1.18_1       yii2-advanced-docker_php7.1.18   latest   29681e350bf9   553 MB

[amtf@amtf-s3 yii2-advanced-docker]$ docker-compose exec mongo bash
```

```mongodb
mongo --port 27017 -u root -p example --authenticationDatabase "admin"
use yii
db.createUser(
  {
    user: "yii",
    pwd: "yii-mongodb",
    roles: [ { role: "readWrite", db: "yii" } ]
  }
)

try {
   db.products.insertOne( { item: "card", qty: 15 } );
} catch (e) {
   print (e);
};

try {
   db.books.insertOne( { name: "CURL", author: "Sam Loord" } );
} catch (e) {
   print (e);
};

```