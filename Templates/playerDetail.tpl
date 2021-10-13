{include file='templates/header.tpl'}
<body class="fondoPlayerList">

<table>
    <thead>
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>POSICION</th>
            <th>EQUIPO</th>
            <th>Nº CAMISETA</th>
            <th>EDAD</th>
            <th>SELECCION<th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{$player->nombre}</td>
            <td>{$player->apellido}</td>
            <td>{$player->posicion}</td>
            <td>{$player->equipo}</td>
            <td>{$player->numero_camiseta}</td>
            <td>{$player->edad}</td>
            <td>{$player->nombre_seleccion}</td>
        </tr>

    </tbody>
</table>

 {if $logged == true}
<form class="form-alta" action="modifyPlayer/{$player->id_jugador}" method="POST">
                
        <input placeholder="Nombre" type="text" name="nombre" required>
        <input placeholder="Apellido" type="text" name="apellido" required>
        <input placeholder="Camiseta" type="number" name="numeroCamiseta" required>
        <input placeholder="Equipo" type="text" name="equipo" required>
        <input placeholder="Posicion" type="text" name="posicion" required>
        <input placeholder="Edad" type="number" name="edad" required>
        <input type="submit" class="btn btn-success" value="Modificar">
    </form>
     {/if}


     <div>
        <p><a href="nation/{$player->fk_id_nacionalidad}">volver</a></p>
    </div>



    
{include file='templates/footer.tpl'}