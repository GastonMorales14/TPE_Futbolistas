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

 {if $logged == true}
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


     


</div>



    
{include file='templates/footer.tpl'}