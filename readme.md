# Getting Started

1. Clone this repo && cd into it
1. Run `cp .env.example .env`
1. Run `docker-compose up -d`
1. Run `docker exec -it assignment-project npm run watch` to build/watch with webpack
1. Visit [http://localhost:8085](http://localhost:8085) to see the page.
1. Connect to the MySQL db with these creds: 

```
host:       127.0.0.1
port:       3308
db:         assignment
username:   assignment
password:   secret
```

# Interacting with the Docker Container

The application is now running _within_ the docker container. There's a mysql container and an application container. These are basically computers within your computer.

To "get in" to the application container in order to run commands, you'll need to run this:

```bash
# - execute in an interactive terminal (-it)
# - on the assignment-project container
# - the bash command (to open a prompt)
[local computer] $ docker exec -it assignment-project bash

# Now you can run whatever you like from within the container:
[docker container] $ php artisan tinker
```

# Versions Inside and Outside of Docker

The version of PHP on your local machine won't be used and won't affect the running of the application in the docker container. You do not need to change the version of PHP in the Dockerfile/composer.json.

Any composer commands should be run from inside the docker container: 

```
docker exec -it assignment-project composer install

# or... 
[local computer] $ docker exec -it assignment-project bash
[docker container] $ composer install
```

--- 

Same goes for npm. Your local npm shouldn't be run. Instead, run it on the container or from inside the container: 

```
docker exec -it assignment-project npm install
docker exec -it assignment-project npm run watch

# or... 
[local computer] $ docker exec -it assignment-project bash
[docker container] $ npm install
[docker container] $ npm run watch
```