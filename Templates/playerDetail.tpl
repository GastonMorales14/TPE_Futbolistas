{include file='templates/header.tpl'}
<body class="fondoJugadores">
<div class="container">
    <div>
        <a class="mt-3 btn fondoHeder text-decoration-none text-white" href="nation/{$player->fk_id_nacionalidad}">volver</a>
    </div>
    <div class="row">
        <div class="d-flex justify-content-start col-6">
            <div class="pt-5">
                <div class="card">
                    <img src="./images/imagenparajugador.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="display-3 card-title text-center">{$player->nombre}, {$player->apellido}</h5>
                        <ul class="card-text">
                            <li>POSICION: {$player->posicion}</li>
                            <li>EQUIPO: {$player->equipo}</li>
                            <li>Nº CAMISETA: {$player->numero_camiseta}</li>
                            <li>EDAD: {$player->edad}</li>
                            <li>SELECCION: {$player->nombre_seleccion} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {if $role == 1} {* si el usuario es admin muestro = *}
        <div class="col-6">
            <h2 class="display-3 text-center text-light">Modificar Jugador</h2>
            <form class="form-alta mb-5 mt-5 row" action="modifyPlayer/{$player->id_jugador}" method="POST">
                            
                <input class="col-4 px-1 mt-1"placeholder="Nombre" type="text" name="nombre" required>
                <input class="col-4 px-1 mt-1" placeholder="Apellido" type="text" name="apellido" required>
                <input class="col-4 px-1 mt-1" placeholder="Camiseta" type="number" name="numeroCamiseta" required>
                <input class="col-4 px-1 mt-1" placeholder="Equipo" type="text" name="equipo" required>
                <input class="col-4 px-1 mt-1" placeholder="Posicion" type="text" name="posicion" required>
                <input class="col-4 px-1 mt-1" placeholder="Edad" type="number" name="edad" required>
                <div class="d-flex flex-row justify-content-center">
                    <input type="submit" class="btn fondoHeder text-white w-25 mt-3 col-4" value="Modificar">
                </div>
            </form>
        </div>
     {/if}

    </div>

    <h6 class="text-light">COMENTARIOS</h6>
    
    <form id="frm-comment" data-email={$email}>
            <div class="input-row">
                <textarea class="input-field" type="text" name="comment"
                    id="comment" placeholder="Add a Comment">  </textarea>
            </div>
            <div id="valuation" class="valuation">
                <input id="radio1" type="radio" name="stars" value="5">
                <label for="radio1">★</label>
                <input id="radio2" type="radio" name="stars" value="4">
                <label for="radio2">★</label>
                <input id="radio3" type="radio" name="stars" value="3">
                <label for="radio3">★</label>
                <input id="radio4" type="radio" name="stars" value="2">
                <label for="radio4">★</label>
                <input id="radio5" type="radio" name="stars" value="1">
                <label for="radio5">★</label>
            </div>
            <button id="btn-comment" type="submit" name="submitRatingStar" class="btn btn-primary btn-sm">Enviar</button>

        </form>
     


    <section id="commentSection" class="text-light" data-user={$role} data-player={$id}>
        {include file='templates/vue/comments.tpl'}
    </section>
</div>

<script src="js/comments.js"></script>
</body>
    
{include file='templates/footer.tpl'}