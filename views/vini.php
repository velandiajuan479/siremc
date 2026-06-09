<?php
    require_once ('controllers/cini.php');
?>
    <div class="card card-form p-4 mb-5 d-flex flex-column align-items-center justify-content-center"
    style="min-height: 80vh; width: 50%; margin: 0 auto;">

    <h1 class="display-title text-center mb-4">Inicio de Sesión</h1>

    <div class="login-box w-100">
        <form>

            <div class="mb-3">
                <label class="form-label">Usuario o E-mail</label>
                <input type="text" class="form-control" placeholder="Ingresa tu Usuario o E-mail">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control mb-2" placeholder="Ingresa tu Contraseña">

                <div class="d-flex justify-content-between align-items-center">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Mostrar contraseña</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                </div>
            </div>
            <br>
            <button class="form-control btn btn-primary mb-3">Iniciar Sesión</button>
        </form>
        <div class="text-center">
            <a href="#">Cambiar contraseña</a><br>
            <a href="#">Registrarme</a>
        </div>
    </div>
    <div class="table-container mt-4">
        <h5 class="mb-3">Usuarios Registrados</h5>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Correo</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if($datAll){ foreach ($datAll as $dt) { ?>
                    <tr>
                        <td><?=$dt['nomper'];?></td>
                        <td><?=$dt['rhper'];?></td>
                        <td><?=$dt['emaper'];?></td>    
                    </tr>
                    <?php }}; ?>0
                </tbody>
            </table>
        </div>
    </div>
</div>