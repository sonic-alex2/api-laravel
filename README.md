
# tarea2-analisisDeSistemas2

## Datos de laravel
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About de este proyecto

En el siguiente repositorio se podra encontrar los archivos php con el framework de laravel, una ves clonado el repositorio se debera crear una base de datos.


## Se debe de tener instalado php, y mysql
## (se asume que el usuario mysql es root y esta sin contraseña)
## si no editar los siguiente datos (en el archivo):
```php

DB_DATABASE=nombreDeBaseDeDatosQueCreaste
DB_USERNAME=usurioCreado
DB_PASSWORD=passwordCreado
```
## lo anterior en mi maquina local

## Crear un archivo con extencion ".env"
## Pegar los siguiente, en el archivo creado:

```php

APP_NAME=tarea-numeros-primo
APP_ENV=local
APP_KEY=base64:MdrqU37Vj3ecZYpSZaT1cATxgVHcE+mqZq2PLrUmwYU=
APP_DEBUG=true
APP_URL=http://tarea-numeros-primo

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tarea-numeros-primo
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

SANCTUM_TOKEN_PREFIX=""
SESSION_DOMAIN=localhost
SANCTUM_STATEFUL_DOMAINS=localhost:5173

```
## Por ultimo Correr el siguiente comando (se debe de tener como variable global en windows "php"):
## se debe de correr el comando en la misma ubicacion que la raiz del todo el proyecto.

## --> crea las tablas necesarias(si ya esta creada la base de datos y con los accesos correctos, con los servidor mysql funcionando)

```php

$ php artisan migrate:fresh

#pone en ejecucion la aplicacion.
$ php artisan serve

#saldra un mensaje similar al siguiente:
 INFO  Server running on [http://127.0.0.1:8000].

#Crear un usario en el apartado "Register" (o similar)
http://127.0.0.1:8000/register

```

### Url para demos

- **[Demo](https://api.blexzy.com/)**

### Extras del framework utilizado.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======


## Autor

| [<img src="https://avatars.githubusercontent.com/u/8519258?v=4" width=115><br><sub>Jorge Ramos</sub>](https://github.com/sonic-alex2) |
| :---: |
