{include file='Templates/header.tpl'}
<body class="fondoHome">


<div class="container w-75 justify-content-center mt-4 mb-4 rounded shadow">
      <div class="bg-white p-5 rounded-end">
        <div class="btn fondoHeder">
            <a href="login" class="text-decoration-none text-white">Volver</a> 
        </div>
        <h2 class="fw-bold text-center py-5 text-info">Eliminatorias Sud</h2>
        <p class="fw-bold text-center pb-5 text-secondary">Registrate para ver las citaciones de tu Seleccion!</p>
       
       <form class="form-alta" action="createUser" method="post">
            <div class="col-12">
              <label class="form-label">Nombre</label>
              <input class="form-control" type="text" name="name" required>
            </div>
            <div class="col-12">
              <label class="form-label">Apellido</label>
              <input class="form-control" type="text" name="surname" required>
            </div>
            <div class="col-12">
              <label class="form-label">Fecha de nacimiento</label>
              <input class="form-control" type="date" name="birthday" id="birthday" required>
            </div>
            <div class="col-12">
              <label class="form-label">Correo Electronico</label>
              <input class="form-control" type="text" name="email" id="email" required>
            </div>
            <div class="col-12">
              <label class="form-label">Password</label>
              <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="col-12 mt-3">
              <input type="submit" class="btn fondoHeder text-white" value="Registrate">
            </div>
        </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

    



{include file='Templates/footer.tpl'}