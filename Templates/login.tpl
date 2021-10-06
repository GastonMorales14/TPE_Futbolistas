{include file='templates/header.tpl'}

<div>

    <div>
        <div>
            <h2>Log In</h2>
            <form class="form-alta" action="verify" method="post">
                <input placeholder="email" type="text" name="email" id="email" required>
                <input placeholder="password" type="password" name="password" id="password" required>
                <input type="submit" class="btn btn-primary" value="Login">
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

    <div>
        <p>¿No tenes cuenta? <a href="register">Registrate</a></p>
    </div>

</div>

{include file='templates/footer.tpl'}