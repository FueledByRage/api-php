# How to use:

Use it on wammp in order to access throught localhost

Intall it's depedencies with composer

```
    composer install
```

Execute it's migration 

```
    .\vendor\bin\phinx migrate
```

You can also create container to it's services (MySQL, adminer and RabbitMQ) using docker-compose

```
    docker-compose up
```

# About: 
It's an API built in vanilla PHP trying to apply some SOLID concepts. Its purpose is to increase my skills on a new language as apply server concepts without frameworks.

# Why: 
As a JS developer i've been using express on my stack. After realizing that i was conformed with my skills i realized this as a bad thing to me.
I decided to learn a new language as apply SOLID which i was already studying and build a new project without any framework as a challenge.

# Routes

Base url: http://localhost/public_html/api
## user

ENDPOINT | METHOD | PARAMS | EXPECTED SUCCESS | EXPECTED ERROR
---------|--------|--------|------------------|---------------|
/user/register|  POST  | username, password, email, about | http response status 200 | error status code {message: message error}
/user/?username | GET | username | data from an user | error status code {message: message error}

## post

ENDPOINT | METHOD | PARAMS | EXPECTED SUCCESS | EXPECTED ERROR
---------|--------|--------|------------------|---------------|
/post/register | POST | body, token, file | http response status 200 | error status code {message: message error}
/post/?author | GET | author username | posts from the given author | error status code {message: message error}

## login

ENDPOINT | METHOD | PARAMS | EXPECTED SUCCESS | EXPECTED ERROR
---------|--------|--------|------------------|---------------|
/login | POST | email, password | {token: jwt token: username: username } | error status code {message: message error}

by [Erik](https://www.linkedin.com/in/erik-natan-moreira-santos-983865195/)