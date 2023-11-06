// ¿Qué son los primitivos?
/**
 * Informacion que no son un objeto y son inmutables
 * Boolean
 * Null, sin valor en lo absoluto
 * Undefined, variable declarada que no tiene asignado un valor
 * Number, integer, floats
 * String, cadena de caracteres
 * Symbol, valor unico que no es igual a otro valor
 */
//Conocer el tipo de dato de una variable
let a = 'Hola'
let b = null
let sym1 = Symbol('a')
let sym2 = Symbol('a')
console.log( typeof a ) //string
console.log( typeof b ) //objet
console.log( sym1 === sym2 ) //false

// Palabras reservadas
/*
https://mothereff.in/js-variables -> Validador de variables
break export super
case extends switch
catch finally this
class for throw
const function try
continue if typeof
debugger import var
default in void
delete instanceof while
do new with
else return yield
let enum package public
implements private static
interface protected await
null undefined true
false hasOwnProperty undefined
isNaN Infinity isFinite
NaN length Math
isPrototypeOf prototype valueOf
name Number Object
String toString prompt
alert conform
*/

// Arreglos
const arr = new Array(10) // Un arreglo vacio de 10 elementos
const arreglo = []
const videojuegos = ['MarioBros', 'Pacman', 'Tetris', 'Doom'] 
console.log({videojuegos}) // {videojuegos: Array(3)}
const arrCosas = [
  true,
  123,
  'Javier',
  function(){},
  ()=>{},
  { a: 1},
  ['Z', 'X', 'Y']
]
console.log( arrCosas )
console.log( arrCosas[6][2])

// Metodos de arrays
console.log( videojuegos.length ) // Devuelve la longitud
console.log( videojuegos[ videojuegos.length -1 ]) //Devuelve el ultimo elemento
videojuegos.forEach( ( elemento, indice, arr) => { 
  console.log({elemento, indice, arr })
})
videojuegos.push('NuevoElemento') // Inserta un nuevo elemento al final del array y retorna la nueva longitud
videojuegos.unshift('OtroElemento') // Inserta nuevos elementos al inicio del array y retorna la nueva longitud
const eliminados = videojuegos.splice(0,2) // Elimina los elementos que le pasemos
const indice = videojuegos.indexOf('NuevoElemento') // Indica el indice del elemento, si no existe retorna -1
console.log({eliminados})
console.log({indice})

// Objetos literales
const tienda = {
  producto: 'manzana',
  precio: 10,
  cantidad: 100,
  variantes: ['verde', 'roja'],
  provedores:{
    nombre: 'Frutas S.A',
    provincia: 'Soria'
  }
}

console.log( tienda['cantidad'])
console.log( tienda.producto )
console.log( tienda.variantes[1])
console.log( tienda.provedores.provincia)
//Borrar una propiedad del objeto
delete tienda.cantidad
//Congelar un objeto 
Object.freeze( tienda )
// Obtener las propiedades en un array
Object.getOwnPropertyNames( tienda )
// Obtener los valores del objeto en un array
Object.values( tienda )
// Documentacion URL
// https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Object

// Funciones básicas
function saludar(nombre){
  console.log(arguments) // Muestra todos los elementos que le pasemos a la funcion
  console.log('Hola ' + nombre)
}

// Funciones de flecha
const despedir = (nombre) =>{
  console.log('Adios ' + nombre)
}

// Retorno de las funciones
const funcionRetorno = ()=>{
  console.log('Hola funcion')
  return [10,20]
}

const numeroAleatorio = () => Math.random()

const retorno = funcionRetorno()

console.log(retorno[0])
console.log( numeroAleatorio() )

// Protips
function crearPersona( nombre, apellido ) {
  return{
    nombre: nombre, //desde ES6 se puede simplificar si el nombre de la propiedad es igual al nombre de la variable
    apellido: apellido
  }
}

const crearPersonaPro = (nombre, apellido) => {{ nombre, apellido }}

function imprimeArgumentos(){
  console.log( arguments )
}

const imprimeArgumentosPro = (...args) => { //Parametro rest, despues del parametro rest no puede venir otro argumento
  console.log(args)
}

const [ nombre, edad, apellidos] = imprimeArgumentosPro('Juan', 20, 'Garcia')
console.log({nombre, edad, apellidos})

const extraePropiedad = ({nombre, precio, stock}) => {
  console.log({nombre})
  console.log({precio})
  console.log({stock})
}

extraePropiedad( tienda )