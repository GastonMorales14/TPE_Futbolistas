{include file='templates/header.tpl'}
<body class="fondoHome">

    <div class="d-flex flex-row justify-content-between fondoHeder container-fluid">
        
        <h1 class="text-white mt-5 mb-5 px-3 text-start col-8 col-xs-12">Eliminatorias Sudamericanas</h1>       
                    
        <h2 class="text-white col-2 col-xs-12 pt-4 text-uppercase ">Bienvenido {$name}</h2>
        <a href="logout" class="btn fondoHeder text-decoration-none text-white pt-5 col-1 col-xs-12">CERRAR SESION</a>
        {if $role == 1} {* solo se muestra a administradores *}
            <a href="users" class="btn fondoHeder text-decoration-none text-white pt-5 col-1 col-xs-12">USUARIOS</a>
        {/if}           
                        
    </div>

    <h2 class="mt-5 text-center pt-5 text-white">ELIJA SU SELECCION</h2>

    <section class="d-flex flex-row flex-wrap justify-content-around marginHome">
        {foreach from=$nations item=$nation}
            <div class="banderas mb-4 mx-3">
                <a href="nation/{$nation->id_nacionalidad}"><img src="./images/{$nation->nombre_seleccion}.png"  width="200"></a>
            </div>
        {/foreach}                    
    </section>

    {if $role == 1} {* solo se muestra a administradores *} 
        <form class="form-alta d-flex flex-row justify-content-end pe-5 mt-5" action="createNation" method="POST">
            <input class="w-25" placeholder="Agregar una seleccion sudamericana" type="text" name="seleccion" required>
            <input type="submit" class="btn fondoHeder text-white" value="Agregar">
        </form>     
    {/if}



</body>



{include file='templates/footer.tpl'}