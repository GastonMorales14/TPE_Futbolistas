{include file='templates/header.tpl'}

<div>

    <div>
        <div>
            <h2>Registrarse</h2>
            <form class="form-alta" action="createUser" method="post">
                
                <input placeholder="Nombre" type="text" name="name" id="name" required>
                <input placeholder="Apellido" type="text" name="surname" id="surname" required>
                <input placeholder="Fecha de nacimiento" type="date" name="birthday" id="birthday" required>
                <input placeholder="email" type="text" name="email" id="email" required>
                <input placeholder="password" type="password" name="password" id="password" required>
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

    <div>
        <p><a href="login">volver</a></p>
    </div>

    

</div>

{include file='templates/footer.tpl'}