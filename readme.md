# Course project for docker

## Docker

### Project run 
```
$ docker-domposer up -d
```
### Status check
```
$ docker-domposer ps
```

### Log in to container
```
$ docker exec -ti <CONTAINER_NAME> bash 
```

`CONTAINER_NAME` for server = `courseprojectdocker_todo-server_1`

## Laravel cache clear

Clear Laravel configuration cache.
You can cache the configuration files in Laravel using
```
$ php artisan config:cache  
```
There's also a way to clear the cache
```
$ php artisan cache:clear  
```
But, this won't clear the configuration cache. To do that you need to use
```
$ php artisan config:clear  
```

## Certification question
https://laravel.com/certification/prepare/

[certification topics with explanation](./documentation/certification.md)