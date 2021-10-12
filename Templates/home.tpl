{include file='templates/header.tpl'}
<body class="fondoHome">



 <div class="d-flex flex-row justify-content-between bg-primary">
    <div class="container">
    <h1 class="text-white mt-5 col-8 text-start">Eliminatorias Sudamericanas</h1>
    
    
    <div class="d-flex flex-row justify-content-end row">
        <h2 class="text-white col-2 text-end">Bienvenido</h2>
        <a href="logout" class="btn btn-primary text-decoration-none text-white p-0 col-2">LOGOUT</a> 
    </div>  
    </div>
        
</div>

<h2 class="mt-5 text-center text-white">ELIJA SU SELECCION</h2>
<section class="d-flex flex-row justify-content-around marginHome">
    {foreach from=$nations item=$nation}
        <div class="banderas">
        <a href="nation/{$nation->id_nacionalidad}"><img src="./images/{$nation->nombre_seleccion}.png"  width="200"></a>
        </div>

    {/foreach}
</section>





{include file='templates/footer.tpl'}