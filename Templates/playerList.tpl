{include file='templates/header.tpl'}

    <h1>JUGADORES</h1>

    <table>
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>POSICION</th>
                <th>EQUIPO</th>
                {if $role == true}
                    <th>ELIMINAR</th>
                    <th>MODIFICAR</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$players item=$player}
            <tr>
                <td>{$player->nombre}</td>
                <td>{$player->apellido}</td>
                <td>{$player->posicion}</td>
                <td>{$player->equipo}</td>
                {if $role == true}
                    <td><a class="btn" href="deletePlayer/{$player->id_jugador}">Eliminar</a></td>
                    <td><a class="btn" href="modifyPlayer/{$player->id_jugador}">Modificar</a></td>
                {/if}
            </tr>

            {/foreach}
        </tbody>
    </table>
    
    <a href="logout">Logout</a>


    {if $role == true}
    <h2>Cargar jugador</h2>

    <form class="form-alta" action="createPlayer" method="post">
                
        <input placeholder="Nombre" type="text" name="nombre" required>
        <input placeholder="Apellido" type="text" name="apellido" required>
        <input placeholder="equipo" type="text" name="equipo" required>
        <input placeholder="posicion" type="text" name="posicion" required>
        <select name="fk_id_nacionalidad">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Uruguay</option>
            <option value="4">Colombia</option>
        </select>
        <input type="submit" class="btn btn-success" value="Crear">
    </form>
    {/if}

    
    
    





{include file='templates/footer.tpl'}