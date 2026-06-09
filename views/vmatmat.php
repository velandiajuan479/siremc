<?php
    require_once("controllers/cmatmat.php");
?>
    <div class="container mt-4">

        <div class="card card-form mb-4">
            <div class="card-body p-4">
                <h5 class="mb-4">
                    <i class="fa-solid fa-clipboard"></i>
                    <strong><?= $editando ? "Editar Matrícula" : "Nuevo Registro de Matrícula"; ?></strong>
                </h5>
                <form action="" method="POST">

                    <?php if ($editando) { ?>
                        <input type="hidden" name="accion" value="actualizar">
                    <?php } else { ?>
                        <input type="hidden" name="accion" value="guardar">
                    <?php } ?>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="nomat" class="form-label">
                                <strong>Número de Matrícula</strong><span class="required-mark">*</span>
                            </label>
                            <input type="number" class="form-control" id="nomat" name="nomat"
                                   placeholder="Ej. 1001"
                                   value="<?= $editando ? $editando['nomat'] : ''; ?>"
                                   <?= $editando ? 'readonly' : ''; ?> required>
                        </div>
                        <div class="col-md-4">
                            <label for="novig" class="form-label">
                                <strong>Vigencia</strong><span class="required-mark">*</span>
                            </label>
                            <input type="number" class="form-control" id="novig" name="novig"
                                   placeholder="N° de vigencia existente"
                                   value="<?= $editando ? $editando['novig'] : ''; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="fecmat" class="form-label">
                                <strong>Fecha de Matrícula</strong><span class="required-mark">*</span>
                            </label>
                            <!-- Se cambió datetime-local por date y se quitó la T para usar solo fecha limpia -->
                            <input type="date" class="form-control" id="fecmat" name="fecmat"
                                   value="<?= $editando ? date('Y-m-d', strtotime($editando['fecmat'])) : ''; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="folnmat" class="form-label">
                                <strong>Folio</strong><span class="required-mark">*</span>
                            </label>
                            <input type="number" class="form-control" id="folnmat" name="folnmat"
                                   placeholder="Folio numérico"
                                   value="<?= $editando ? $editando['folnmat'] : ''; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <!-- SE QUITA EL REQUERIDO YA QUE EN BD ACEPTA NULL -->
                            <label for="idcur" class="form-label">
                                <strong>ID Curso</strong>
                            </label>
                            <input type="number" class="form-control" id="idcur" name="idcur"
                                   placeholder="ID del curso existente"
                                   value="<?= $editando ? $editando['idcur'] : ''; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="idest" class="form-label">
                                <strong>ID Estudiante</strong><span class="required-mark">*</span>
                            </label>
                            <input type="number" class="form-control" id="idest" name="idest"
                                   placeholder="ID del estudiante"
                                   value="<?= $editando ? $editando['idest'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="insedu" class="form-label">
                                <strong>Institución Sede</strong>
                            </label>
                            <input type="text" class="form-control" id="insedu" name="insedu"
                                   placeholder="Nombre de la sede"
                                   value="<?= $editando ? $editando['insedu'] : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="nivel" class="form-label">
                                <strong>Nivel</strong>
                            </label>
                            <input type="text" class="form-control" id="nivel" name="nivel"
                                   placeholder="Ej. Primaria"
                                   value="<?= $editando ? $editando['nivel'] : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="grado" class="form-label">
                                <strong>Grado</strong>
                            </label>
                            <input type="number" class="form-control" id="grado" name="grado"
                                   placeholder="Ej. 5"
                                   value="<?= $editando ? $editando['grado'] : ''; ?>">
                        </div>
                        <!-- NUEVO CAMPO ADICIONADO: inggrado (REQUERIDO EN BD) -->
                        <div class="col-md-3">
                            <label for="inggrado" class="form-label">
                                <strong>Ingreso Grado</strong><span class="required-mark">*</span>
                            </label>
                            <input type="number" class="form-control" id="inggrado" name="inggrado"
                                   placeholder="Ej. 1"
                                   value="<?= $editando ? $editando['inggrado'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="ano" class="form-label">
                                <strong>Año Escolar</strong>
                            </label>
                            <input type="number" class="form-control" id="ano" name="ano"
                                   placeholder="Ej. 2026"
                                   value="<?= $editando ? $editando['ano'] : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="estmat" class="form-label">
                                <strong>Estado</strong>
                            </label>
                            <input type="number" step="0.1" class="form-control" id="estmat" name="estmat"
                                   placeholder="Ej. 1"
                                   value="<?= $editando ? $editando['estmat'] : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="ubimat" class="form-label">
                                <strong>Ubicación</strong>
                            </label>
                            <input type="number" class="form-control" id="ubimat" name="ubimat"
                                   placeholder="ID de ubicación"
                                   value="<?= $editando ? $editando['ubimat'] : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="pesmat" class="form-label">
                                <strong>Peso</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.1" class="form-control" id="pesmat" name="pesmat"
                                       placeholder="0.0"
                                       value="<?= $editando ? $editando['pesmat'] : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label d-block">
                                <strong>Activo Matrícula</strong>
                            </label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="actmat" id="si" value="1"
                                           <?= (!$editando || $editando['actmat'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="si">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="actmat" id="no" value="0"
                                           <?= ($editando && $editando['actmat'] == 0) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <?php if ($editando) { ?>
                            <a href="index.php?pg=3" class="btn btn-secondary">Cancelar</a>
                        <?php } ?>
                        <button type="submit" class="btn btn-institutional">
                            <?= $editando ? "Actualizar Matrícula" : "Guardar Matrícula"; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-container">
            <h5 class="mb-3">
                <i class="fa-solid fa-clipboard"></i>
                <strong>Listado de Matrículas Registradas</strong>
            </h5>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>N° Matrícula</th>
                            <th>Vigencia</th>
                            <th>Fecha</th>
                            <th>Folio</th>
                            <th>Curso</th>
                            <th>Estudiante</th>
                            <th>Sede</th>
                            <th>Nivel</th>
                            <th>Grado</th>
                            <th>Año</th>
                            <th>Peso</th>
                            <th>Activo</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($datAll) { foreach ($datAll as $dt) { ?>
                            <tr>
                                <td><strong><?= $dt["nomat"]; ?></strong></td>
                                <td><?= $dt["novig"]; ?></td>
                                <!-- Se formatea la fecha para ocultar la hora en la lista -->
                                <td><?= date('Y-m-d', strtotime($dt["fecmat"])); ?></td>
                                <td><?= $dt["folnmat"]; ?></td>
                                <td><?= $dt["idcur"]; ?></td>
                                <td><?= $dt["idest"]; ?></td>
                                <td><?= $dt["insedu"]; ?></td>
                                <td><?= $dt["nivel"]; ?></td>
                                <td><?= $dt["grado"]; ?></td>
                                <td><?= $dt["ano"]; ?></td>
                                <td>$ <?= number_format($dt["pesmat"], 1); ?></td>
                                <td><?= $dt["actmat"] == 1 ? 'Sí' : 'No'; ?></td>
                                <td class="text-end">
                                    <a href="index.php?pg=3&accion=editar&id=<?= $dt['nomat']; ?>"
                                       class="text-dark me-3 fs-5" title="Editar">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="index.php?pg=3&accion=eliminar&id=<?= $dt['nomat']; ?>"
                                       class="text-dark fs-5" title="Eliminar"
                                       onclick="return confirm('¿Está seguro de eliminar esta matrícula?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>