<?php
    require_once("controllers/cusuper.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga Masiva de Usuarios</title>
</head>
<body>
    <div class="container mt-4">

        <h1 class="display-title">
            <i class="fa-solid fa-users"></i> Módulo de Carga Masiva de Usuarios
        </h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= ($tipoMensaje === 'success') ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                <?= $mensaje; ?>
            </div>
        <?php endif; ?>

        <div class="card card-form mb-4">
            <div class="card-body p-4">

                <form method="POST" action="" enctype="multipart/form-data">

                    <input type="hidden" name="accion" id="form_accion" value="guardar">

                    <!-- ===== DATOS DEL ESTUDIANTE ===== -->
                    <h5 class="mb-4">
                        <i class="fa-solid fa-user-graduate"></i>
                        <strong>Datos del Estudiante</strong>
                    </h5>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="doc_est" class="form-label">
                                <strong>Documento</strong><span class="required-mark">*</span>
                            </label>
                            <input type="text" class="form-control" id="doc_est" name="doc_est"
                                   placeholder="Número de documento" required>
                        </div>
                        <div class="col-md-8">
                            <label for="nombre_est" class="form-label">
                                <strong>Nombre completo</strong><span class="required-mark">*</span>
                            </label>
                            <input type="text" class="form-control" id="nombre_est" name="nombre_est"
                                   placeholder="Nombres y apellidos" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fecha_nac" class="form-label">
                                <strong>Fecha nacimiento</strong><span class="required-mark">*</span>
                            </label>
                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                        </div>
                        <div class="col-md-6">
                            <label for="genero" class="form-label">
                                <strong>Género</strong><span class="required-mark">*</span>
                            </label>
                            <select class="form-select" id="genero" name="genero" required>
                                <option value="">Seleccione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>

                    <!-- ===== DATOS DEL CONTACTO ===== -->
                    <h5 class="mb-4 mt-2">
                        <i class="fa-solid fa-address-book"></i>
                        <strong>Datos del Contacto</strong>
                    </h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">
                                <strong>Teléfono</strong><span class="required-mark">*</span>
                            </label>
                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                   placeholder="Número de contacto" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">
                                <strong>Correo</strong><span class="required-mark">*</span>
                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="correo@ejemplo.com" required>
                        </div>
                    </div>

                    <!-- ===== DATOS DE MATRÍCULA ===== -->
                    <h5 class="mb-4 mt-2">
                        <i class="fa-solid fa-clipboard"></i>
                        <strong>Datos de Matrícula</strong>
                    </h5>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="grado" class="form-label">
                                <strong>Grado</strong><span class="required-mark">*</span>
                            </label>
                            <select class="form-select" id="grado" name="grado" required>
                                <option value="">Seleccione</option>
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                                <option value="4">Cuarto</option>
                                <option value="5">Quinto</option>
                                <option value="6">Sexto</option>
                                <option value="7">Séptimo</option>
                                <option value="8">Octavo</option>
                                <option value="9">Noveno</option>
                                <option value="10">Décimo</option>
                                <option value="11">Undécimo</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="fecha_mat" class="form-label">
                                <strong>Fecha matrícula</strong><span class="required-mark">*</span>
                            </label>
                            <input type="date" class="form-control" id="fecha_mat" name="fecha_mat" required>
                        </div>
                        <div class="col-md-4">
                            <label for="estado" class="form-label">
                                <strong>Estado</strong><span class="required-mark">*</span>
                            </label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="">Seleccione</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <!-- ===== CARGA MASIVA ===== -->
                    <h5 class="mb-4 mt-2">
                        <i class="fa-solid fa-file-csv"></i>
                        <strong>Carga Masiva</strong>
                    </h5>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="input_archivo" class="form-label">
                                <strong>Subir archivo estructurado (.CSV separado por punto y coma)</strong>
                            </label>
                            <input type="file" class="form-control" name="archivo" accept=".csv" id="input_archivo">
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-institutional">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar Registros
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ===== LISTADO ===== -->
        <div class="table-container">
            <h5 class="mb-3">
                <i class="fa-solid fa-clipboard"></i>
                <strong>Estudiantes Matriculados en el Sistema</strong>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Estudiante</th>
                            <th>N° Matrícula</th>
                            <th>Grado</th>
                            <th>Fecha Registro</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($datAll)): ?>
                            <?php foreach ($datAll as $dt): ?>
                                <tr>
                                    <td><?= htmlspecialchars($dt['nuiper']); ?></td>
                                    <td><?= htmlspecialchars($dt['nomper']); ?></td>
                                    <td><strong><?= htmlspecialchars($dt['nomat']); ?></strong></td>
                                    <td><?= htmlspecialchars($dt['grado']); ?></td>
                                    <td><?= htmlspecialchars($dt['fecmat']); ?></td>
                                    <td>
                                        <span class="badge <?= $dt['actmat'] ? 'bg-success' : 'bg-danger'; ?>">
                                            <?= $dt['actmat'] ? 'Activo' : 'Inactivo'; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    No se encontraron registros de usuarios matriculados.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        document.getElementById('input_archivo').addEventListener('change', function () {
            document.getElementById('form_accion').value =
                this.files.length > 0 ? 'cargar_masiva' : 'guardar';
        });
    </script>
</body>
</html>