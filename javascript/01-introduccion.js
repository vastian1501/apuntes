// Historia de JavaScript
/*
  - Brendan Eich es su fundador, junto con Netscape
  - Surgio la necesidad de crear un lenguaje que se ejecutara del lado del cliente
  - 1997 se envio primera version a ECMA(European Computer Manufactures Association)
  - Algunas personas se refieren como ECMAScript
*/

/**
 * Versiones de Javascript
 * 1996 LiveScript a JavaScript (Estandar)
 * 1997 ES1
 * 2009 ES5
 * 2015 ES6/ES2015 (la actualizacion mas grande)
 * Decidieron hacer lanzamientos anuales, 2016, 2017...
 */

// Uso de JavaScript en la industria actual
/*
- Aplicaciones Web
- Crear presentaciones (Reveal.js)
- Web Servers (servidores web)
- Videojuegos (Underrun)
- Aplicaciones Moviles
*/

/**
 * Polyfill
 * Es un codigo que provee funcionamiento de una nueva caracteristica de JavaScript(ES6) 
 * en versiones viejas como ES5
 */

// Hola Mundo en JavaScript
console.log('Hola Mundo') //Lo escribe por consola
document.write('Hola Mudno') //Lo escribe en el HTML
/*
- Para usar javascript en la terminal debemos tene instalado Node
  $node --version
- Para escribir codigo de javascript ejecutamos:
  $node
- Para abrir un documento de javascript, accedemos a la ruta del documento desde la terminal
- y escribimos el siguiente comando:
  $node index.js
- Otra forma de ejecutar javascript es creando un documento html e incluir el script en el
- Una buena practica es separar el html y el javascript
*/


// Creación de variables y constantes 
/*
- Una variable es un contenedor de informacion que apunta a un lugar en memoria
- esta informacion puede cambiar en el futuro
- Estas variables estan alojadas en el objeto window
*/
let a = 10
const b = 20
let c = 30, d = 40, e = a - c
let x = a + c
// b = 20 -> esto da error

// Introducción a la consola de JavaScriptç
/**
 * JavaScript es un lenguaje interpretado, va de manera secuencial
 * Si hay parentesis puede ser una funcion o un metodo
 * Un metodo es una funcion dentro un objeto
 */

console.log(a) // 10
console.warn(b) // 20
console.error(c) // 30

// Para imprimir el nombre de las variables de puede
console.log({a}) // {a: 10}

// Mostrar con estilos css
console.log('%c Mis variables', 'color:blue; font-weight:bold')

// Para incluir en formato de tabla
console.table({a, b, c, d, e, x})

// Constantes en mayuscula se usan cuando son de entorno o globales
const NOMBRE = 'Javier'

// Depuración y breakpoints
/**
 * Se pueden hacer desde el navegador o desde el IDE
 * Primero hay que marcar un breakpoint en nuestro codigo
 * Luego ejecutamos el debug con F5, es necesario tener nodejs
 * Cuando inicia la depuracion lee todo el documento de js y nos muestra las variables o funciones
 * En Debug Console podemos ver los mensajes del console.log 
 */

// Problemas con la declaración de variables con var
/**
 * Deshabilitar el cache en network dentro de nuestro navegador
 * El let y el const no sobreescriben las variables globales de window
 * Cualquier variable que no este inicializada va a tener el valor de undefined
 * Let nos proporciona codigo mas limpio
 */
var outerWidth = 5000 // Sobreecribe a window.outerWidth
let outerWidth = 500 // No sobreescribe a window.outerWidth y crea una nueva variable

// Prompts, alerts, confirms.(Esto esta dentro del objeto window)
alert('Hola mundo') //Alerta, bloquea la ejecuccion
let nombre = prompt('¿Cual es tu nombre?', 'Escribe tu nombre') // Retorna por defecto lo que el usuario escribe en el, se asigna a la variable
const seleccion = confirm('¿Estas seguro de eliminar al usuario X?') // Retorna true o false dependiendo lo que interactue el usuario
