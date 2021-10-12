{include file='templates/header.tpl'}
<body>
<div>

    <div>
        <div>
            <h2>Log In</h2>
            
            <form class="form-alta" action="verify" method="post">
                <div class="mb-3">
                    <input placeholder="email" type="text" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <input placeholder="password" type="password" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-secondary" value="Login">
                </div>
            </form>
        </div>

       



    </div>
    <h4 class="alert-danger">{$error}</h4>

    <div>
        <p>¿No tenes cuenta? <a href="register">Registrate</a></p>
    </div>

</div>
º
{include file='templates/footer.tpl'}