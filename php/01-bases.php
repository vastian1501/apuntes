<?php
// Constantes
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';

// Variables
$string = 'Hola mundo';
$int = 1;
$float = 1.5;
$bool = true;
$array = [1, 2, 3, 4, 5];
$null = null;
$objet = new stdClass();

// Operadores
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

// Estructuras de control
if (1 === 1) {
  echo 'Si';
} else {
  echo 'No';
}

echo '<br>';
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

echo '<br>';
echo match ($dia) {
  1 => 'Lunes',
  2 => 'Martes',
  3 => 'Miercoles',
  4 => 'Jueves',
  5 => 'Viernes',
  default => 'Día no válido',
};

// Funciones
function saludar(): void
{
  echo 'Hola saludo desde una funcion';
  echo '<br>';
}

function restar(int $num1, int $num2): int
{
  return $num1 - $num2;
}

echo '<br>';
saludar();
echo '<br>';
echo restar(12, 2);

// Funciones anomimas
$countdown = function (int $num): void {
  echo sprintf('Cuenta atras: %d', $num);
  echo '<br>';
};

$multiplicar = function (int $num1, int $num2): int {
  return $num1 * $num2;
};

if (is_callable($multiplicar)) {
  echo 'Es una funcion';
  echo '<br>';
  echo $multiplicar(2, 2);
  echo '<br>';
}

// Bucles
$array = [1, 2, 3, 4, 5];
$array2 = [...$array, 6, 7, 8, 9, 10]; //Spread operator

echo '<br>';

foreach ($array2 as $item) {
  echo $item;
  echo '<br>';
}

echo '<br>';
echo json_encode($array2);

for ($i = 10; $i >= 0; $i--) {
  $countdown($i);
}

echo '<br>';

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

//Clases
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
echo '<br>';
echo sprintf('Tu nombre es %s y tienes %d años', $user1->name, $user1->age);



// Clases contructor properties promotion
class Empleado
{
  public function __construct(
    public string $nombre,
    public int $edad,
    public string $profesion
  ) {}

  // Metodo magico toString para imprimir el objeto
  public function __toString()
  {
    return sprintf('Desde el metodo. El empleado %s tiene %d años y es %s', $this->nombre, $this->edad, $this->profesion);
  }
}

$empleado = new Empleado('John', 40, 'Developer');

echo '<br>';
echo sprintf('El empleado %s tiene %d años y es %s', $empleado->nombre, $empleado->edad, $empleado->profesion);

echo '<br>';
echo $empleado;

// Clases anónimas
$mascota = new class('Luna', 'Bulldog') {
  public function __construct(public string $nombre, public string $raza){}

  public function __toString()
  {
    return sprintf('La mascota se llama %s', $this->nombre);
  }
};

echo '<br>';
echo $mascota;

$mensaje = new class {
  public function error(): string {
    return "Mensaje de error";
  }
};

echo '<br>';
echo $mensaje->error();

// Spread operator
$animales = ['perro', 'gato', 'pez'];
$animales2 = [...$animales,'tigre', 'leon', 'elefante'];

echo  '<br>';
echo sprintf('Los animales son %s', json_encode($animales2));

function sumar(...$numbers)
{
  return array_sum($numbers);
}

echo '<br>';
echo sprintf('La suma de los numeros es: %d', sumar(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));

function contructorDePalabras($prefix, $sufix, ...$worlds)
{
  return $prefix . implode(",", $worlds) . $sufix;
}
echo '<br>';
echo contructorDePalabras('(', ')', 'hola', 'mundo', 'como', 'estas');

// Enums
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

// Traits, herencia multiple en php, no se puede heredar de varias clases pero si de varios traits, se pueden usar para compartir metodos entre clases

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

// Interfaces, se usan para definir metodos que deben implementar las clases que la implementen
interface AnimalInterface{
  public function comer(string $comida): string;
}

class Animal implements AnimalInterface {
  public function comer(string $comida): string{
    return sprintf('El animal come %s', $comida);
  }

}

$perro = new Animal('Luna', 'Bulldog');

echo '<br>';
echo $perro->comer('carne');


// Crear instancias desde el contructor
class Animales{
  public function __construct(
    private Animal $comida = new Animal() // Se crea una instancia de la clase Animal
  ){}

  public function comer(string $comida): string{
    return $this->comida->comer($comida); // Se llama al metodo comer de la clase Animal
  }
}

$animal = new Animales();

echo '<br>';
echo $animal->comer('frutas');

// Named Arguments, nos permite pasar los argumentos en cualquier orden, se usa en los metodos y funciones que se crean
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

// Exception handling, manejo de excepciones en php
function division(int $a, int $b){
  if($b === 0){
    throw new Exception('Error.No se puede dividir por 0');
  }
  return $a / $b;
}

try {
  echo '<br>';
  echo division(10, 0);
} catch (Exception $e) {
  echo '<br>';
  echo $e->getMessage();
}
echo '<br>';

// Generadores, permite producir una secuencia de resultados en lugar de un único valor.

function generateRange(int $start, int $end): Generator {
  for ($i = $start; $i <= $end; $i++) {
      yield $i; //Cuando se llama a un generador, devuelve un objeto que se puede recorrer con un bucle foreach.
  }
}

foreach (generateRange(1, 10) as $number) {
  echo $number, ' ';
}

// Secuencia Fibonacci

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

echo '<br>';
foreach (fibonacci(100) as $number) {
  echo $number, ' ';
}