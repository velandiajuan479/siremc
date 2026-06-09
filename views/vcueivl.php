<?php
    require_once("controllers/ccueivl.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ítem Valor</title>
</head>
<body>
<section class="container mt-4">
    <div class="card card-form mb-4">
        <div class="card-body p-4">
            <h5 class="mb-4">
                <i class="fa-solid fa-clipboard"></i>
                <strong><?= $dtOn ? "Editar Registro" : "Nuevo Registro"; ?></strong>
            </h5>
            <form action="" method="POST">

                <?php if ($dtOn) { ?>
                    <input type="hidden" name="noitval" value="<?= $dtOn['noitval']; ?>">
                    <input type="hidden" name="ope" value="3">
                <?php } else { ?>
                    <input type="hidden" name="ope" value="1">
                <?php } ?>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="noitem" class="form-label">
                            <strong>ÍTEM</strong><span class="required-mark">*</span>
                        </label>
                        <select name="noitem" id="noitem" class="form-select" required>
                            <option value="" selected disabled>Seleccione un ítem...</option>
                            <?php if ($itemsDisponibles) { foreach ($itemsDisponibles as $it) { ?>
                                <option value="<?= $it['noitem']; ?>"
                                    <?= ($dtOn && $dtOn['noitem'] == $it['noitem']) ? 'selected' : ''; ?>>
                                    <?= $it['nomitem']; ?>
                                </option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="novig" class="form-label">
                            <strong>VIGENCIA</strong><span class="required-mark">*</span>
                        </label>
                        <input type="text" class="form-control" id="novig" name="novig"
                               placeholder="Ej. 2026"
                               value="<?= $dtOn ? $dtOn['novig'] : ''; ?>"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label for="valor" class="form-label">
                            <strong>VALOR ASIGNADO</strong><span class="required-mark">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">$</span>
                            <input type="number" class="form-control" id="valor" name="valor"
                                   step="0.01" placeholder="0.00"
                                   value="<?= $dtOn ? $dtOn['valor'] : ''; ?>"
                                   required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label d-block">
                            <strong>¿VALOR VIGENTE?</strong><span class="required-mark">*</span>
                        </label>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="act_valor" id="val_si" value="1"
                                   <?= (!$dtOn || $dtOn['act_valor'] == 1) ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="val_si">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="act_valor" id="val_no" value="0"
                                   <?= ($dtOn && $dtOn['act_valor'] == 0) ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="val_no">No</label>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <?php if ($dtOn) { ?>
                        <a href="index.php?pg=11" class="btn btn-secondary">Cancelar</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-institutional">
                        <?= $dtOn ? "Actualizar Valor" : "Registrar Valor"; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-container mt-4">
        <h5 class="mb-3">
            <i class="fa-solid fa-clipboard"></i>
            <strong>Listado de Valores Registrados</strong>
        </h5>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Ítem</th>
                        <th>Vigencia</th>
                        <th>Valor Asignado</th>
                        <th>Vigente</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if ($datAll) { foreach ($datAll as $dt) { ?>
                        <tr>
                            <td><strong><?= $dt["nomitem"]; ?></strong></td>
                            <td><?= $dt["novig"]; ?></td>
                            <td>$ <?= $dt["valor"]; ?></td>
                            <td><?= $dt["act_valor"] == 1 ? "Sí" : "No"; ?></td>
                            <td class="text-end">
                                <a href="index.php?pg=11&ope=2&noitval=<?= $dt['noitval']; ?>"
                                   class="text-dark me-3 fs-5" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="index.php?pg=11&ope=4&noitval=<?= $dt['noitval']; ?>"
                                   class="text-dark fs-5" title="Eliminar"
                                   onclick="return eliminar('<?= $dt['nomitem'].'.'.$dt['novig'].'.'.$dt['valor']; ?>');">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
</body>
</html>