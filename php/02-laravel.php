<?php
// Introduccion
/**
 * Laravel se ejecuta gracias al archivo index.php del directorio public/
 * El archivo autoload se encarga de cargar todas las dependencias
 * En el archivo bootstrap/app.php se cargan o se crean las instancias
 * Tenemos dos Kernel, una que atiende las peticiones http y otro que atiende la consola
 * Bootstrappers-> son funciones que permiten el funcionamiento de nuestro app
 * Dentro de la clase Kernel encontramos estos bootsrappers
 * La clase RegisterFacades nos proporciona facades que las encontramos en config/app -> aliases
 * Facades son clases que usan el metodo magico call static y nos van a permitir acceder
 * a estos recursos sin ser metodos staticos
 * 
 */

// Controladores
/**
 * Metodo __invoke() -> Accede directamente a este metodo, cuando se haga un llamado a la clase
 */

// Comandos Artisan
/**
 * down -> pone en manteniemiento la app
 * up -> la quita del modo mantenimiento
 * tinker -> permite interactuar con codigo php desde la linea de comandos
 * 
 */

// Variables de entorno
/**
 * Para usar variables de entorno en la vista
 * Hay que usarlas a traves de archivos de configuracion
 * {{ config('app.name') }} -> OK
 * {{ env('APP_NAME') }} -> NOK
 * Si no se carga el archivo .env pueden quedar en NULL los valores
 */

// Sistemas de bases de datos
/**
 * Tres formas de hacer consultas:
 * Consultas planas
 * Constructor de consultas (query builder)
 * Eloquent ORM
 * Se puede tener una BD para escritura y otra para lectura
 * Podemos tener multiple bases de datos
 * Para consultas planas se usa la facade DB::select()
 */

// Query Builder
/**
 * Usamos la facade DB::
 * get() -> Obtenemos un coleccion
 * first() -> Obtenemos un objeto
 * value('email) -> Obtenemos unicamente el valor
 * find(3) -> Obtenemos una fila 
 * pluck('title') -> Obtenemos una lista con valores de columna, devuelve un array
 * chuck(100) -> Hace las consultas segun el numero que le pasemos, trae de 100 en 100 los datos
 * count(), max(), min(),
 * exists(), doesntExists()
 * DB::raw() -> consultas avanzadas
 * join(), joinLeft(), joinRight()
 * where([]), whereBetween()
 * dd(), dump() -> para hacer debbug
 */

// Migraciones
/**
 * php artisan make:migration create_XXXX_table
 * php artisan make:migration add_XXXX_to_XXXX_table
 * rollback -> Deshace todas la migraciones
 * php artisan schema:dump -> nos crea un schema de nuestra base de datos
 * after()-> crea la columna despues de la columna que le especifiquemos
 * Tip: primero crear la estructura de la base de datos con migraciones y luego el diagrama
 * onDelete('cascade') -> si se elimina el padre se elimina el hijo
 * nullOnDelete() -> si se elimina el padre, el hijo queda null
 */

// Modificar Columnas con doctrine/dbal
/**
 * composer require doctrine/dbal
 * php artisan make:migration update_title_to_posts_table
 */

// Seeder y factories
/**
 * Una buena practica es tener un seeder por cada factory
 * php artisan make:factory PostFactory
 * php artisan make:seeder PostSeeder
 * En el PostSeeder -> Post::factory(10)->create()
 * En el DatabaseSeeder(principal) -> $this->call([
 *  PostSeeder::class,
 * ])
 */

// Eloquent y relaciones
/**
 * Cuando creamos una relacion, y es de uno a muchos la nombramos en plural(logica):
 * public function posts(){
 *  return $this->hasMany(Post::class);
 * }
 */

/**
 * fillable -> datos permitidos, evita asignacion masiva
 * guarded -> datos que no va a permitir insertar
 */

// Tinker REPL(ReadEvalPrintLoop) -> bucle lectura evaluacion impresion
/**
 * Para publicar las configuraciones de tinker
 * php artisan vendor:publish
 * Elegimos y obtenemos la configuracion en config/tinker.php
 */

/**
 * Para usar un modelo:
 *
 * use App\Models\User
 * User::all()
 */

/**
 * Con Tinker tambien podemos insertar, actualizar o eliminar
 * datos en la tabla:
 * 
 * $post = new Post()
 * $post->title = "Nuevo Titulo"
 * $post->save() // Devuelve true si es correcto
 */

// Laravel Breeze
/**
 * composer require laravel/breeze --dev
 * php artisan breeze:install
 * php artisan migrate
 * npm install
 * npm run dev
 */

/**
 * Para user la verificacion de correo:
 * Descomentamos la primera linea del modelo User
 * use Illuminate\Contracts\Auth\MustVerifyEmail;
 * y la implementamos a la clase
 */

/**
 * Para usa MailTrap
 * Accedemos a https://mailtrap.io/
 * y copiamos las credenciales en nuestro .env
 */
