Bienvenidxs a la base de datos de personajes de Marvel

-Para utilizar la base de datos, se debe importar 
el archivo que se encuentra dentro de la carpeta 'database'.

-El endpoint que se debe utilizar es:
    "http://localhost/tpe-dos/api/characters"
para así poder visualizar las listas de personajes.

-Si se quiere ver algun personaje en particular se debe poner al lado de '/characters' en la url '/:id' y el ':id' representando el número de id
especifico que se quiere visualizar.

-Si se quiere borrar debe ser con el comando DELETE y se debe ingresar un user: Fabri y password: Marvel en Basic Auth, borrar characters en la url y poner auth/token, utilizando la función GET,quedando así:
    http://localhost/tpe-dos/api/auth/token
luego se imprimirá el token, se debe poner la url del archivo que se quiere borrar con su id (por ejem: 'characters/1'), e ingresar el token en Bearer Token y envíar lo pedido.

-Para añadir se deben cumplir los espacios:
'personaje'
'raza'
'afiliacion'
'lgbt'
'fem'
'universo'
Para lgbt y fem se debe escribir '1' si se refiere a que el personaje pertenece a dicha comunidad y '0' si no lo hace. Y para universo es del 1 al 5 dependiendo de si pertenece a:
1 - universo 616
2 - paralelo utópico
3 - universo 19999
4 - universo 65
5 - universo 20080

-Si se quiere ordenar los personajes se debe poner al lado de 'characters' en la url '/orderby' y poner a su vez
'/asc' o '/ASC' si se decide que es ascendente, '/desc' o '/DESC' si se decide que sea descendente.

-Si se quiere filtrar los universos se pone al lado de characters '/universe' y al lado '/:id' representando el número de universo del 1 al 5.

-Si se quiere ordenar el universo filtrado se debe poner lo anterior junto con '/asc' o '/ASC' si se decide que es ascendente, '/desc' o '/DESC' si se decide que sea descendente.