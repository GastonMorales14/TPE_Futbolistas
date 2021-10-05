{include file='templates/header.tpl'}



    <h1>JUGADORES</h1>

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
            {foreach from=$players item=$player}
            <tr>
                <td>{$player->nombre}</td>
                <td>{$player->apellido}</td>
                <td>{$player->posicion}</td>
                <td>{$player->equipo}</td>
            </tr>
            {/foreach}
        </tbody>
    </table>
   





{include file='templates/footer.tpl'}