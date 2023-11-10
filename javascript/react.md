
# <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1150px-React-icon.svg.png' width='30'/> Apuntes de React

*******
Tabla de contenidos  
1. [PropTypes](#proptypes)
2. [DefaultProps](#defaultprops)
*******

## PropTypes
Para usarlas hay que importarlos
  
```jsx
import PropTypes from 'prop-types'
```
  
Para usarlo:

```jsx
NombreComponente.prototypes = { 
  prop: PropTypes.string.isRequired 
} 
```

## DefaultProps

Definir directamente:
```jsx
const App = ({nombre = 'Juan', edad = '32'}) => {}
```
Definir como objeto:
```jsx

Componente.defaultProps = {
 nombre: 'Juan',
 edad: '32'
}
```
