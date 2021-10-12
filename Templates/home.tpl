{include file='templates/header.tpl'}
<body class="fondoPlayerList">
{foreach from=$nations item=$nation}
    <ul>
        <li>
            <a href="nation/{$nation->id_nacionalidad}">{$nation->nombre_seleccion}</a>
        </li>
    </ul>
{/foreach}

<a href="logout">Logout</a>


{include file='templates/footer.tpl'}