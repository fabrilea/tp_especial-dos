Bienvenidxs a la base de datos de personajes de Marvel

-Para utilizar la base de datos, se debe importar el archivo que se encuentra dentro de la carpeta 'database'.

-El endpoint que se debe utilizar para así poder visualizar las listas de personajes es:
    "http://localhost/tpe-dos/api/characters"


-Si se quiere ordenar, filtrar, limitar o paginar los personaje al lado de 'characters' se debe poner '?' y poner a su vez una de las 5 opciones: 
'sortBy:
    sort= (asc (ascendente) o desc (descendente)) default: asc'
    field= (elegir uno de los siguientes campos: id, personaje, raza, afiliacion, lgbt, fem, universo) default: id',
'where= (y elegir un universo del 1 al 5 (1 - universo 616, 2 - paralelo utópico, 3 - universo 19999, 4 - universo 65, 5 - universo 20080)) default: todos', 
'limit= (un número aleatorio) default: todos', 
'offset= (un número aleatorio) default: 0'.
NOTA: si se quieren utilizar dos o más de estas funciones a la vez se debe poner un '&' para separarlas quedando:
"http://localhost/tpe-dos/api/characters?sort=asc&field=id"

-Si se quiere ver algun personaje en particular se debe poner al lado de '/characters' en la url '/:id' y el ':id' representando el número de id
especifico que se quiere visualizar. Por ejemplo:
"http://localhost/tpe-dos/api/characters/1" (se mostraría el personaje de Wiccan solamente).


-Si se quiere borrar debe ser con el comando DELETE y se debe ingresar un user: Fabri y password: Marvel en Basic Auth, borrar characters en la url y poner auth/token, utilizando la función GET,quedando así:
    "http://localhost/tpe-dos/api/auth/token"
luego se imprimirá el token, se debe poner la url del archivo que se quiere borrar con su id (por ejem: 'characters/1'), e ingresar el token en Bearer Token y envíar lo pedido.

-Para añadir un personaje se deben cumplir los espacios:
'personaje'
'raza'
'afiliacion'
'lgbt'
'fem'
'universo'
Para los campos lgbt y fem se debe escribir '1' si se refiere a que el personaje pertenece a dicha comunidad y '0' si no lo hace. Y para universo es del 1 al 5 dependiendo de si pertenece a:
1 - universo 616
2 - paralelo utópico
3 - universo 19999
4 - universo 65
5 - universo 20080

