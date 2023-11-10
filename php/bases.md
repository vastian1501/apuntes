# <img src='https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg' width='60' /> Apuntes PHP

<div id='indice'></div>

*******
Tabla de contenidos
1. [Constantes](#constantes)
2. [Variables](#variables)
3. [Operadores](#operadores)
4. [Estructuras de control](#estructuras-de-control)
5. [Funciones](#funciones)
6. [Funciones anónimas](#funciones-anónimas)
7. [Clases](#clases)
8. [Clases constructor property promotion](#clases-constructor-property-promotion)
9. [Clases anónimas](#clases-anónimas)
10. [Spread operator](#spread-operator)
11. [Enums](#enums)
12. [Traits](#traits)
13. [Interfaces](#interfaces)
14. [Crear instancias desde el contructor](#crear-instancias-desde-el-constructor)
15. [Exception handling](#exception-handling)
16. [Generadores](#generadores)
17. [Secuencia Fibonacci](#secuencia-fibonacci)
18. [Números pares con generador](#números-pares-con-generador)
19. [Ordenamiento burbuja](#ordenamiento-burbuja)
20. [Alterar arrays con array_map](#alterar-arrays-con-array_map)
21. [Filtrar arrays con array_filter](#filtrar-arrays-con-array_filter)
*******

## Constantes
[🏠Índice](#indice)
```php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';
```

## Variables
[🏠Índice](#indice)
```php
$string = 'Hola mundo';
$int = 1;
$float = 1.5;
$bool = true;
$array = [1, 2, 3, 4, 5];
$null = null;
$objet = new stdClass();
```

## Operadores
[🏠Índice](#indice)
```php
$result = 1 + 1;
$result = 1 - 1;
$result = 1 * 1;
$result = 1 / 1;
$result = 1 % 1;
$result = 1 ** 1;
$result = 1 <=> 1; // 0
$result = 1 <=> 2; // -1
$result = 1 <=> 0;  // 1
$ternario = 1 === 1 ? 'Si' : 'No';
```
## Estructuras de control
[🏠Índice](#indice)
```php
if (1 === 1) {
  echo 'Si';
} else {
  echo 'No';
}

$dia = 2;
switch ($dia) {
  case 1:
    echo 'Lunes';
    break;
  case 2:
    echo 'Martes';
    break;
  case 3:
    echo 'Miercoles';
    break;
  case 4:
    echo 'Jueves';
    break;
  case 5:
    echo 'Viernes';
    break;
  default:
    echo 'Día no válido';
    break;
}

echo match ($dia) {
  1 => 'Lunes',
  2 => 'Martes',
  3 => 'Miercoles',
  4 => 'Jueves',
  5 => 'Viernes',
  default => 'Día no válido',
};
```

## Funciones
[🏠Índice](#indice)
```php
function saludar(): void
{
  echo 'Hola saludo desde una funcion';
  echo '<br>';
}

function restar(int $num1, int $num2): int
{
  return $num1 - $num2;
}

saludar();
echo restar(12, 2);
```

## Funciones anónimas
[🏠Índice](#indice)
```php
$countdown = function (int $num): void {
  echo sprintf('Cuenta atras: %d', $num);
  echo '<br>';
};

$multiplicar = function (int $num1, int $num2): int {
  return $num1 * $num2;
};

if (is_callable($multiplicar)) { //true
  echo 'Es una funcion';
  echo '<br>';
  echo $multiplicar(2, 2);
  echo '<br>';
}
```

## Bucles
[🏠Índice](#indice)
```php
$array = [1, 2, 3, 4, 5];
$array2 = [...$array, 6, 7, 8, 9, 10]; //Spread operator

echo '<br>';

foreach ($array2 as $item) {
  echo $item;
  echo '<br>';
}

echo json_encode($array2);

for ($i = 10; $i >= 0; $i--) {
  $countdown($i);
}


$num = 10;
do {
  $countdown($num);
  $num--;
} while ($num >= 0);

$num1 = 1;
while ($num1 <= 10) {
  $countdown($num1);
  $num1++;
}
```

## Clases
[🏠Índice](#indice)
```php
class User
{
  public string $name;
  public int $age;

  public function __construct(string $name,int $age)
  {
    $this->name = $name;
    $this->age = $age;
  }
}

$user1 = new User('John', 40);

echo sprintf('Tu nombre es %s y tienes %d años', $user1->name, $user1->age);
```

## Clases constructor property promotion
[🏠Índice](#indice)
```php
class Empleado
{
  public function __construct(
    public string $nombre,
    public int $edad,
    public string $profesion
  ) {}

  // Metodo mágico toString para imprimir el objeto
  public function __toString(){
      return sprintf('Desde el metodo. El empleado %s tiene %d años y es %s', $this->nombre, $this->edad, $this->profesion);
  }
}

$empleado = new Empleado('John', 40, 'Developer');

echo sprintf('El empleado %s tiene %d años y es %s', $empleado->nombre, $empleado->edad, $empleado->profesion);

echo $empleado;
```

## Clases anónimas
[🏠Índice](#indice)
```php
$mascota = new class('Luna', 'Bulldog') {
  public function __construct(public string $nombre, public string $raza){}

  public function __toString(){
    return sprintf('La mascota se llama %s', $this->nombre);
  }
};

echo $mascota;

$mensaje = new class { //no es necesario -> ()
  public function error(): string {
    return "Mensaje de error";
  }
};

echo '<br>';
echo $mensaje->error();
```
## Spread operator
[🏠Índice](#indice)
```php
$animales = ['perro', 'gato', 'pez'];
$animales2 = [...$animales,'tigre', 'leon', 'elefante'];

echo sprintf('Los animales son %s', json_encode($animales2));

function sumar(...$numbers)
{
  return array_sum($numbers);
}

echo sprintf('La suma de los numeros es: %d', sumar(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));

function contructorDePalabras($prefix, $sufix, ...$worlds)
{
  return $prefix . implode(",", $worlds) . $sufix;
}

echo contructorDePalabras('(', ')', 'hola', 'mundo', 'como', 'estas');
```

## Enums
[🏠Índice](#indice)
```php
enum Rol {
  case Admin;
  case User;
  case Guest;
}

class  Users{
  public function __construct(public string $name, public Rol $rol){}
}

$usuario1 = new Users('Raul', Rol::Guest);

echo '<pre>';
var_dump($usuario1);
echo '</pre>';
```

## Traits
[🏠Índice](#indice)
> Herencia multiple en php, no se puede heredar de varias clases pero si de varios traits, se pueden usar para compartir métodos entre clases.

```php
trait Bienvenida {
  public function bienvenida(): string{
    return 'Bienvenido';
  }
}

class MiBienvenida{
  use Bienvenida;
}

$bienvenida = new MiBienvenida();

echo '<br>';
echo $bienvenida->bienvenida();
```

## Interfaces
[🏠Índice](#indice)
> Se usan para definir metodos que deben implementar las clases que la implementen

```php
interface AnimalInterface{
  public function comer(string $comida): string;
}

class Animal implements AnimalInterface {
  public function comer(string $comida): string{
    return sprintf('El animal come %s', $comida);
  }
}

$perro = new Animal('Luna', 'Bulldog');

echo $perro->comer('carne');
```

## Crear instancias desde el constructor
[🏠Índice](#indice)
```php
class Animales{
  public function __construct(
    private Animal $comida = new Animal() // Se crea una instancia de la clase Animal
  ){}

  public function comer(string $comida): string{
    return $this->comida->comer($comida); // Se llama al método comer de la clase Animal
  }
}

$animal = new Animales();

echo '<br>';
echo $animal->comer('frutas');
```

## Named Arguments
[🏠Índice](#indice)
> Nos permite pasar los argumentos en cualquier orden, se usa en los métodos y funciones que se crean

```php
function crearEmpleados(string $nombre, int $edad, string $profesion){
  return new Empleado($nombre, $edad, $profesion);
}

$empleado = crearEmpleados(profesion: 'Abogado', nombre: 'Luis', edad: 30);

echo '<br>';
echo $empleado->nombre;
echo '<br>';
echo $empleado->edad;
echo '<br>';
echo $empleado->profesion;
```

## Exception handling
[🏠Índice](#indice)
> Manejo de excepciones en php
```php
function division(int $a, int $b){
  if($b === 0){
    throw new Exception('Error.No se puede dividir por 0');
  }
  return $a / $b;
}

try {
  echo division(10, 0);
} catch (Exception $e) {
  echo $e->getMessage();
}
```

## Generadores
[🏠Índice](#indice)
> Permite producir una secuencia de resultados en lugar de un único valor.

```php
function generateRange(int $start, int $end): Generator {
  for ($i = $start; $i <= $end; $i++) {
      yield $i; //Cuando se llama a un generador, devuelve un objeto que se puede recorrer con un bucle foreach.
  }
}

foreach (generateRange(1, 10) as $number) {
  echo $number, ' ';
}
```

## Secuencia Fibonacci
[🏠Índice](#indice)
```php
function fibonacci(int $num): Generator {
  $current = 1;
  $prev = 0;

  for($i = 0; $i < $num; $i++){
    yield $current;
    $temp = $current;
    $current = $prev + $current;
    $prev = $temp;
  }
}

foreach (fibonacci(10) as $number) {
  echo $number, ' ';
}
```

## Números pares con generador
[🏠Índice](#indice)
```php
function obtenerPares(int $ini, int $fin): Generator {
  for( $i =  $ini; $i <= $fin; $i++){
    if($i % 2 === 0){
      yield $i;
    }
  }
}

foreach (obtenerPares(1, 50) as $number) {
  echo $number, ' ';
}
```

## Ordenamiento burbuja
[🏠Índice](#indice)
```php
function bubbleSort(array $array): array {
  $count = count($array);
  for($i = 0; $i < $count; $i++){
    for($j = 0; $j < $count - $i - 1; $j++){
      if($array[$j] > $array[$j + 1]){
        $temp = $array[$j];
        $array[$j] = $array[$j + 1];
        $array[$j + 1] = $temp;
      }
    }
  }
  return $array;
}

$arrayNumeros = [32,3,4,55,22,12,34];
echo json_encode(bubbleSort($arrayNumeros));
```

## Alterar arrays con array_map
[🏠Índice](#indice)
```php
$personas = ['Juan', 'Pedro', 'Luis', 'Maria'];

$nuevasPersonas = array_map(function($persona){
  return $persona . ' Perez';
}, $personas);

echo json_encode($nuevasPersonas);
```

## Filtrar arrays con array_filter
[🏠Índice](#indice)
```php
$productos = [
  [
    'nombre' => 'Laptop',
    'precio' => 1000,
  ],
  [
    'nombre' => 'Mouse',
    'precio' => 20,
  ],
  [
    'nombre' => 'Teclado',
    'precio' => 50,
  ],
  [
    'nombre' => 'Monitor',
    'precio' => 500,
  ],
];

$productosFiltrados = array_filter($productos, fn($producto) => $producto['precio'] === 500);

echo json_encode($productosFiltrados);
```