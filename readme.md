# Shipping service

## Starting a new project

##### Copy environment file

Open a terminal and copy the env file for your current environment:
```
cp environments/.env.develop .env
cp environments/.env.testing .env.testing
```

##### Composer install
```
docker run --rm -v $(pwd):/app composer install
```

##### Create containers

Open a terminal and *cd* to the folder you have the docker-compose.yml and run:
```
docker-compose up -d
```

This will create the containers and populate the database with the given dump.

##### Seed data, migrate
Config cache
```
docker-compose exec app php artisan config:cache
``` 

Run migration
```
docker-compose exec app php artisan migrate
```

Seed
```
docker-compose exec app php artisan db:seed --class=DatabaseSeeder
```

You can run login api with this credential: leducanhdodo@gmail.com/123456