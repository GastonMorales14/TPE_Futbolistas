{include file='Templates/header.tpl'}
<body class="fondoHome">
<div>

    <div class="container w-75 justify-content-center mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
            
            </div>
            <div class="col bg-white p-5 rounded-end">
               
                <h2 class="fw-bold text-center py-5 text-secondary">Eliminatorias Sud</h2>
            
            <form class="form-alta" action="verify" method="post">
                <div class="mb-4">
                    <label for="email" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn fondoHeder text-white" value="Iniciar Sesion">
                </div>

                <h4 class="alert-danger text-center mb-3">{$error}</h4>

                <div class="my-3">
                    <span>¿No tenes cuenta? <a href="register" class="text-info">Registrate</a> </span>
                </div>
            </form>
               
               
            </div>
              
        </div>
    </div>
</div>

</body>
{include file='Templates/footer.tpl'}