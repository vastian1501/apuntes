# <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png' width='40' /> Apuntes Laravel

<div id='indice'></div>

*******
Tabla de contenidos
1. [Introducción](#introducción)
2. [Controladores](#controladores)
3. [Comandos Artisan](#comandos-artisan)
4. [Variables de entorno](#variables-de-entorno)
5. [Sistemas de bases de datos](#sistemas-de-bases-de-datos)
6. [Query Builder](#query-builder)
7. [Modificar Columnas con doctrine/dbal](#modificar-columnas-con-doctrinedbal)
8. [Seeder y factories](#seeder-y-factories)
9. [Eloquent y relaciones](#eloquent-y-relaciones)
10. [Tinker REPL](#tinker-repl)
11. [Laravel Breeze](#laravel-breeze)
*******

## Introducción
[🏠Índice](#indice)

>Laravel se ejecuta gracias al archivo index.php del directorio public/

>El archivo autoload se encarga de cargar todas las dependencias

>En el archivo bootstrap/app.php se cargan o se crean las instancias

>Tenemos dos Kernel, una que atiende las peticiones http y otro que atiende la consola

>Bootstrappers -> son funciones que permiten el funcionamiento de nuestro app

>Dentro de la clase Kernel encontramos estos bootsrappers

>La clase RegisterFacades nos proporciona facades que las encontramos en config/app -> aliases

>Facades son clases que usan el metodo magico call static y nos van a permitir acceder a estos recursos sin ser metodos staticos

## Controladores
[🏠Índice](#indice)
> Metodo **__invoke()** -> Accede directamente a este método, cuando se haga un llamado a la clase

## Comandos Artisan
[🏠Índice](#indice)
Para acceder a la lista de comandos artisan
```sh
php artisan
```
Poner en mantenimiento
```sh
php artisan down
```
Quitar modo mantenimiento
```sh
php artisan up
```
Interactuar con codigo php desde linea de comandos
```sh
php artisan tinker
```

## Variables de entorno
[🏠Índice](#indice)

- Para usar variables de entorno en la vista
- Hay que usarlas a traves de archivos de configuracion
- **{{ config(' app.name ') }}** -> 🆗
- **{{ env('APP_NAME') }}** -> ❌
- Si no se carga el archivo .env pueden quedar en NULL los valores


## Sistemas de bases de datos
[🏠Índice](#indice)

- Tres formas de hacer consultas:
Consultas planas
Constructor de consultas (query builder)
Eloquent ORM
- Se puede tener una BD para escritura y otra para lectura
- Podemos tener multiple bases de datos
- Para consultas planas se usa la facade DB::select()

## Query Builder
[🏠Índice](#indice)

> Usamos la facade DB
- **get()** -> Obtenemos un coleccion
- **first()** -> Obtenemos un objeto
- **value('email)** -> Obtenemos unicamente el valor
- **find(3)** -> Obtenemos una fila 
- **pluck('title')** -> Obtenemos una lista con valores de columna, devuelve un array
- **chuck(100)** -> Hace las consultas segun el numero que le pasemos, trae de 100 en 100 los datos
- **count(), max(), min()**,
- **exists(), doesntExists()**
- **DB::raw()** -> consultas avanzadas
- **join(), joinLeft(), joinRight()**
- **where([]), whereBetween()**
- **dd(), dump()** -> para hacer debbug


## Migraciones
[🏠Índice](#indice)
```sh
php artisan make:migration create_XXXX_table
```
```sh
php artisan make:migration add_XXXX_to_XXXX_table
```
Crear un schema de nuestra base de datos
```sh
php artisan schema:dump 
```
- **rollback** -> Deshace todas la migraciones
- **after()** -> crea la columna despues de la columna que le especifiquemos
- **onDelete('cascade')** -> si se elimina el padre se elimina el hijo
- **nullOnDelete()** -> si se elimina el padre, el hijo queda null
> Tip: primero crear la estructura de la base de datos con migraciones y luego el diagrama

## Modificar Columnas con doctrine/dbal
[🏠Índice](#indice)
```sh
composer require doctrine/dbal
php artisan make:migration update_title_to_posts_table
```
## Seeder y factories
[🏠Índice](#indice)
> Una buena practica es tener un seeder por cada factory
```sh
php artisan make:factory PostFactory
```
```sh
php artisan make:seeder PostSeeder
```
En el PostSeeder
```php
Post::factory(10)->create()
```

En el DatabaseSeeder(principal)
```php
$this->call([
  PostSeeder::class,
])
```

## Eloquent y relaciones
[🏠Índice](#indice)
- **fillable** -> datos permitidos, evita asignacion masiva
- **guarded** -> datos que no va a permitir insertar
Cuando creamos una relacion, y es de uno a muchos la nombramos en plural, modelo User:
```php
public function posts(){
 return $this->hasMany(Post::class);
}
```
Modelo Post:
```php
public function user(){
 return $this->belongsTo(User::class);
}
```

## Tinker REPL
[🏠Índice](#indice)
> Read Eval Print Loop: bucle lectura evaluación impresión

- Para publicar las configuraciones de tinker
```sh
php artisan vendor:publish
```
- Elegimos y obtenemos la configuracion en config/tinker.php

- Para usar un modelo:
```sh
use App\Models\User
$user = User::all()
$user->posts
```

- Con Tinker tambien podemos insertar, actualizar o eliminar
datos en la tabla:
```sh
$post = new Post()
$post->title = "Nuevo Titulo"
$post->save()  *Devuelve true si es correcto*
```

## Laravel Breeze
[🏠Índice](#indice)
Para instalar:
```sh
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install
npm run dev
```

- Para user la verificacion de correo:
- Descomentamos la primera linea del modelo User
```php
use Illuminate\Contracts\Auth\MustVerifyEmail;
```
- y la implementamos a la clase
```php
class User implements MustVerifyEmail
```


- Para usa MailTrap
- Accedemos a https://mailtrap.io/
- y copiamos las credenciales en nuestro **.env**


