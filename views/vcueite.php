<?php
    require_once("controllers/ccuiete.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Items</title>
</head>
<body>
    <div class="container mt-4">

        <h1 class="display-title">
            <i class="fa-solid fa-clipboard"></i> Gestión de Items
        </h1>

        <div class="card card-form mb-4">
            <div class="card-body p-4">
                <h5 class="mb-4">
                    <i class="fa-solid fa-clipboard"></i>
                    <strong><?= $dtOn ? "Editar Item" : "Nuevo Registro de Item"; ?></strong>
                </h5>
                <form action="" method="POST">

                    <?php if ($dtOn) { ?>
                        <input type="hidden" name="noitem" value="<?= $dtOn['noitem']; ?>">
                        <input type="hidden" name="ope" value="3">
                    <?php } else { ?>
                        <input type="hidden" name="ope" value="1">
                    <?php } ?>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nomitem" class="form-label">
                                <strong>NOMBRE DEL ITEM</strong><span class="required-mark">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="nomitem"
                                name="nomitem"
                                placeholder="Ingrese el nombre del item"
                                value="<?= $dtOn ? $dtOn['nomitem'] : ''; ?>"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="numite" class="form-label">
                                <strong>NÚMERO DEL ITEM</strong><span class="required-mark">*</span>
                            </label>
                            <input
                                type="number"
                                class="form-control"
                                id="numite"
                                name="numite"
                                placeholder="Ingrese el número del item"
                                value="<?= $dtOn ? $dtOn['numite'] : ''; ?>"
                                required>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <?php if ($dtOn) { ?>
                            <a href="index.php?pg=10" class="btn btn-secondary">Cancelar</a>
                        <?php } ?>
                        <button type="submit" class="btn btn-institutional">
                            <?= $dtOn ? "Actualizar Item" : "Guardar Item"; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-container mt-4">
            <h5 class="mb-3">
                <i class="fa-solid fa-clipboard"></i>
                <strong>Listado de Items Registrados</strong>
            </h5>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre del Item</th>
                            <th>Número del Item</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php if ($datAll) { foreach ($datAll as $dt) { ?>
                            <tr>
                                <td><strong><?= $dt["nomitem"]; ?></strong></td>
                                <td><?= $dt["numite"]; ?></td>
                                <td class="text-end">
                                    <a href="index.php?pg=10&ope=2&noitem=<?= $dt['noitem']; ?>"
                                       class="text-dark me-3 fs-5" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="index.php?pg=10&ope=4&noitem=<?= $dt['noitem']; ?>"
                                       class="text-dark fs-5" title="Eliminar"
                                       onclick="return eliminar('<?= $dt['nomitem'].'.'.$dt['numite']; ?>');">
                                        <i class="fa-regular fa-trash-can"></i>
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