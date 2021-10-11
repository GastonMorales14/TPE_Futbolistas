{include file='templates/header.tpl'}


<table>
    <thead>
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>POSICION</th>
            <th>EQUIPO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{$player->nombre}</td>
            <td>{$player->apellido}</td>
            <td>{$player->posicion}</td>
            <td>{$player->equipo}</td>
        </tr>

    </tbody>
</table>

 {if $role == true}
<form class="form-alta" action="modifyPlayer/{$player->id_jugador}" method="POST">
                
        <input placeholder="Nombre" type="text" name="nombre">
        <input placeholder="Apellido" type="text" name="apellido">
        <input placeholder="Equipo" type="text" name="equipo">
        <input placeholder="Posicion" type="text" name="posicion">
        <select name="fk_id_nacionalidad">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Uruguay</option>
            <option value="4">Colombia</option>
        </select>
        <input type="submit" class="btn btn-success" value="Modificar">
    </form>
     {/if}


     <div>
        <p><a href="home">volver</a></p>
    </div>



    
{include file='templates/footer.tpl'}