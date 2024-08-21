# rick-morty-api

## Prueba técnica para el Jornalero

Este repositorio contiene una API para la prueba técnica de el Jornalero. La API conecta con una API externa sobre la serie de animación "Rick and Morty". La API en cuestion tiene varios endpoints, pero para esta prueba solo se han usado 2:

- "https://rickandmortyapi.com/api/character": Este endpoint devuelve un listado de datos con todos los personajes de la serie. Los datos incluyen nombre, sexo, especie y planeta de origen.
- "https://rickandmortyapi.com/api/character/{character_id}": Este endpoint devuelve un listado de datos de un personaje específico. En la API externa existen 826 entradas, por lo tanto los personajes serán del 1 al 826.

Esta API tiene 7 endpoints:

- "https://127.0.0.1/api/register": Este endpoint es de tipo POST, simplemente funciona para poder registrar un usuario en la base de datos SQLITE. Para ello, las credenciales requeridas son 'name', 'email' y 'password', que se deben insertar en el body en POSTMAN como un archivo JSON. Una vez el registro sea exitoso, se retornará un token alfanumérico de autenticación que se debe usar en el header en POSTMAN para poder verificar el usuario.
- "https://127.0.0.1/api/login": Este endpoint es de tipo POST, sirve para iniciar sesión con el token anteriormente mencionado. El token se añade al header como token de autorización y los datos del body deberán ser 'email' y 'password'. Una vez el inicio de sesión sea exitoso, se devolvera un mensaje de exito.
- "https://127.0.0.1/api/favorites": Este endpoint es de tipo POST, este solo se puede acceder una vez se a iniciado sesión con el token de autorización. Sirve para añadir personajes favoritos al listado del usuario con la sesión iniciada. Se necesita el token en el header y en el body se requiere el 'character_id' correspondiente de la API externa, que señale al personaje que se quiere añadir al listado.
- "https://127.0.0.1/api/favorites/index": Este endpoint es de tipo GET, este endpoint sirve para ver el listado de personajes marcados como favoritos. Se necesita, de nuevo, tener el token de autorización en el header y la sesión iniciada.
- "https://127.0.0.1/api/favorites/{character_id}": Este endpoint es de tipo DELETE y sirve para poder eliminar un personaje específico del listado de favoritos. Como en el caso anterior, se necesita tener el token y la sesión iniciada.
- "https://127.0.0.1/api/characters": Este endpoint es de tipo GET y devuelve el listado completo de personajes de la API externa.
- "https://127.0.0.1/api/character/{character_id}": Este endpoint es de tipo GET y devuelve los datos específicos de un personaje, a través del 'character_id'.

## IMPORTANTE

La API actualmente no tiene interfaz gráfica. Solamente funciona el backend con sus endpoints. Para poder probar la API es necesario usar Postman.
