
<?php
    require_once("controllers/cusuemp.php");
?>

<body>

<main class="container mt-5">
    <h1 class="display-title">Registro de Empleado</h1>

    <div class="card card-form p-4">
        <form method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Número Documento <span class="required-mark">*</span></label>
                    <input type="number" name="nodocemp" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Nombre Empleado <span class="required-mark">*</span></label>
                    <input type="text" name="nomemp" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Perfil ID</label>
                    <input type="number" name="pefid" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Password <span class="required-mark">*</span></label>
                    <input type="password" name="pass" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Dirección</label>
                    <input type="text" name="diremp" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telemp" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="emaemp" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Activo</label>
                    <select name="actemp" class="form-control">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Fecha Solicitud</label>
                    <input type="datetime-local" name="fecsolemp" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Clave</label>
                    <input type="text" name="claemp" class="form-control">
                </div>

            </div>

            <div class="text-end mt-3">
                <button class="btn btn-institutional">Guardar</button>
            </div>

        </form>
    </div>

    <div class="table-container mt-4">
        <h5 class="mb-3">Listado de Empleados</h5>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <thead>
<tr>
    <th>Perfil ID</th>
    <th>Nombre de Empleado</th>
    <th>Numero de Documento ID</th>
    <th>Password</th>
    <th>Direccion</th>
    <th>Email</th>
    <th>Fecha Solicitud</th>
    <th>Clave</th>
    <th>Telefono</th>
    <th>Activo</th>


</tr>
</thead>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if($datAll){ foreach ($datAll as $dt) { ?>
    <tr>

    <td><?= $dt["idper"]; ?></td>
    <td><?= $dt["nomper"]; ?></td>
    <td><?= $dt["idper"]; ?></td>
    <td><?= $dt["pasper"]; ?></td>
    <td><?= $dt["dircper"]; ?></td>
    <td><?= $dt["emaper"]; ?></td>
    <td><?= $dt["fsolper"]; ?></td>
    <td><?= $dt["clvper"]; ?></td>
    <td><?= $dt["telcper"]; ?></td>
    <td><?= $dt["actper"]; ?></td>

    </tr>
<?php }} ?>
                    
                </tbody>
            </table>
        </div>
    </div>

</main>

</body>