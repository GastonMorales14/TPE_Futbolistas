{include file='templates/header.tpl'}
<body class="fondoPlayerList">
    <h1>JUGADORES</h1>

    <table>
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>NACIONALIDAD</th>
                <th>VER</th>
                {if $logged == true}
                    <th>ELIMINAR</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$players item=$player}
            <tr>
                <td>{$player->nombre}</td>
                <td>{$player->apellido}</td>
                <td>{$player->nombre_seleccion}</td>

                
                <td><a class="btn" href="viewPlayer/{$player->id_jugador}">Ver</a></td>

                {if $logged == true}
                    <td><a class="btn" href="deletePlayer/{$id}/{$player->id_jugador}">Eliminar</a></td>
                    
                {/if}
            </tr>

            {/foreach}
        </tbody>
    </table>
    
    <p><a href="home">volver</a></p>


    {if $logged == true}
    <h2>Cargar jugador</h2>

    <form class="form-alta" action="createPlayer/{$id}" method="POST">
                
        <input placeholder="Nombre" type="text" name="nombre" required>
        <input placeholder="Apellido" type="text" name="apellido" required>
        <input placeholder="Camiseta" type="number" name="numeroCamiseta" required>
        <input placeholder="Equipo" type="text" name="equipo" required>
        <input placeholder="Posicion" type="text" name="posicion" required>
        <input placeholder="Edad" type="number" name="edad" required>
        
        <input type="submit" class="btn btn-success" value="Crear">
    </form>

    <form class="form-alta" action="modifyNation/{$id}" method="POST">              
        <input placeholder="Nombre" type="text" name="nombre_seleccion" required>
        <input type="submit" class="btn btn-success" value="Modificar">
    </form>
    <a class="btn" href="deleteNation/{$id}">Quitar seleccion</a>
    {/if}


{include file='templates/footer.tpl'}