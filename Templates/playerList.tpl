{include file='templates/header.tpl'}
<body class="fondoJugadores">

<div class="container">

    

    <div class="d-flex flex-row justify-content-end ">
        <a href="home" class="mt-3 btn fondoHeder text-decoration-none text-white">Volver</a> 
        {if $logged == true} {* si el usuario esta loggeado muestro = *}
        <a href="logout" class="mx-3 mt-3 btn fondoHeder text-decoration-none text-white ">Cerrar Sesion</a>
        {else}
            <a href= "login" class="mx-3 mt-3 btn fondoHeder text-decoration-none text-white ">Ingresar</a>    
        {/if}
    </div>
    <h2 class="text-center text-light display-3">JUGADORES</h2>

    {if $logged == true}
    <div class="d-flex flex-row justify-content-around mt-5 mb-5">
    <form class="form-alta w-25" action="modifyNation/{$id}" method="POST">              
        <input placeholder="Modificar nombre de seleccion" type="text" name="nombre_seleccion" required>
        <input type="submit" class="btn btn-success" value="Modificar">
    </form>
    <a class="btn btn-danger" href="deleteNation/{$id}">Quitar seleccion</a>
    </div>
    {/if}

    <table class="table table-primary table-striped  table-borderless">
        <thead class="table-dark border-primary text-center">
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>NACIONALIDAD</th>
                <th>VER</th>
                {if $logged == true} {* si el usuario esta loggeado muestro = *}
                    <th>ELIMINAR</th>
                {/if}
            </tr>
        </thead>
        <tbody class="text-center">
            {foreach from=$players item=$player}
            <tr>
                <td>{$player->nombre}</td>
                <td>{$player->apellido}</td>
                <td>{$player->nombre_seleccion}</td>

                
                <td><a class="btn fondoHeder text-white" href="viewPlayer/{$player->id_jugador}">Ver</a></td>

                {if $logged == true} {* si el usuario esta loggeado muestro = *}
                    <td><a class="btn btn-danger" href="deletePlayer/{$id}/{$player->id_jugador}">Eliminar</a></td>
                    
                {/if}
            </tr>

            {/foreach}
        </tbody>
    </table>
    
   


    {if $logged == true} {* si el usuario esta loggeado muestro = *}
    
    <h2 class="display-3 text-center text-light">Cargar jugador</h2>

    <form class="form-alta mb-5 row" action="createPlayer/{$id}" method="POST">
                
        <input class="col-6 px-1 mt-1" placeholder="Nombre" type="text" name="nombre" required>
        <input class="col-6 px-1 mt-1" placeholder="Apellido" type="text" name="apellido" required>
        <input class="col-6 px-1 mt-1" placeholder="Camiseta" type="number" name="numeroCamiseta" required>
        <input class="col-6 px-1 mt-1" placeholder="Equipo" type="text" name="equipo" required>
        <input class="col-6 px-1 mt-1" placeholder="Posicion" type="text" name="posicion" required>
        <input class="col-6 px-1 mt-1" placeholder="Edad" type="number" name="edad" required>
        <div class="d-flex flex-row justify-content-center">
        <input type="submit" class="btn fondoHeder text-white w-25 mt-3 col-4" value="Crear">
        </div>
    </form>
   

    
    {/if}

 </div>


 </body>
{include file='templates/footer.tpl'}