<?php
require_once("controllers/ccofmod.php");
?>

<div class="card card-form p-4">
    <h4 class="mb-4 text-secondary">
        <i class="fa-solid fa-box-open"></i> 
        <?= $datOne ? 'Editar Módulo' : 'Nuevo Módulo' ?>
    </h4>

    <!--Sección ID del módulo-->

    <form name="frmreg1" method="POST" action="index.php?pg=29&ope=save" class="row g-3 needs-validation" novalidate>
        <input type="hidden" id="idmod" name="idmod" value="<?= $datOne ? $datOne['idmod'] : '' ?>">
        
        <div class="col-md-6">
            <label for="idmod_show" class="form-label">Id módulo<span class="required-mark">*</span></label>
            <input type="text" class="form-control" id="idmod_show" value="<?= $datOne ? $datOne['idmod'] : '' ?>" <?= $datOne ? 'readonly' : '' ?> required placeholder="Ej: 1">
        </div>
        
        <!--Sección de nombre del modulo-->

        <div class="col-md-6">
            <label for="nommod" class="form-label">Nombre módulo<span class="required-mark">*</span></label>
            <input type="text" class="form-control" id="nommod" name="nommod" value="<?= $datOne ? $datOne['nommod'] : '' ?>" required placeholder="Ej: Configuración">
        </div>
        
        <!--Estado del módulo-->

        <div class="col-md-4">
            <label class="form-label d-block">Estado Actual<span class="required-mark">*</span></label>
            <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="actmod" id="actv" value="41" <?= ($datOne && $datOne['actmod'] == 41) ? 'checked' : '' ?> required>
                <label class="form-check-label" for="actv">Activo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="actmod" id="inactv" value="42" <?= ($datOne && $datOne['actmod'] == 42) ? 'checked' : '' ?>>
                <label class="form-check-label" for="inactv">Inactivo</label>
            </div>
        </div>
        
        <!--Sección de icono-->

        <div class="col-md-4">
            <label for="icomod" class="form-label">Icono<span class="required-mark">*</span></label>
            <select name="icomod" id="icomod" class="form-control form-select">
                <option value="0">Selecciona un icono</option>
                <?php if($datIcons) { foreach($datIcons AS $di){ ?>
                    <option value="<?= $di["idval"]; ?>" <?= ($datOne && $datOne['icomod'] == $di["idval"]) ? 'selected' : '' ?>>
                        <i class="<?= $di["nomval"]; ?>"></i> <?= $di["nomval"]; ?>
                    </option>
                <?php }} ?>
            </select>
        </div>
        <!--Sección de usuarios-->

        <div class="col-md-4">
            <label for="idpef" class="form-label">Usuarios con Acceso</label>
            <select name="idpef" id="idpef" class="form-control form-select">
                <option value="0">Sin Usuarios</option>
                <?php if($datus) { foreach($datus AS $dr){ ?>
                <option value="<?= $dr["idpef"]; ?>" <?= ($datOne && $datOne['idpef'] == $dr["idpef"]) ? 'selected' : '' ?>>
                    <?= $dr["nompef"]; ?>
                </option>
                <?php }} ?>
            </select>
        </div>
        
        <!--Orden de carga del módulo-->

        <div class="col-md-2">
            <label for="ordmod" class="form-label">Orden de carga<span class="required-mark">*</span></label>
            <input class="form-control" type="number" name="ordmod" id="ordmod" value="<?= $datOne ? $datOne['ordmod'] : '' ?>" placeholder="Ej:15">
        </div>
        
        <!--Botón de crear o actualizar módulo según se necesite-->

        <div class="col-12 mt-4 text-end">
            <button type="submit" class="btn btn-institutional">
                <i class="bi bi-save me-2"></i>
                <?= $datOne ? 'Actualizar Módulo' : 'Crear Módulo' ?>
            </button>
            <?php if($datOne): ?>
            <a href="index.php?pg=29" class="btn btn-secondary shadow">
                <i class="bi bi-x-circle me-2"></i>Cancelar
            </a>
            <?php endif; ?>
        </div>
    </form>
</div>

        <!--Tabla donde se muestran todos módulos creados-->

<div class="table-container mt-4">
    <h5 class="mb-3">
        <i class="fa-solid fa-box"></i> Listado de Módulos
    </h5>
    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>idmod</th>
                    <th>Icono</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Orden</th>
                    <th>Usuarios con acceso</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if($datAll) { foreach ($datAll as $dt){ ?>
                <tr>
                    <td class="text-center align-middle fw-bold"><?= $dt["idmod"]; ?></td>
                    <td><i class="<?= $dt["nomicon"]; ?>"></i></td>
                    <td><strong><?= $dt["nommod"]; ?></strong></td>
                    <td>
                        <?php if($dt["estados"] == 'Activo'): ?>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1.5 rounded-pill">Activo</span>
                        <?php else: ?>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1.5 rounded-pill">Inactivo</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $dt["ordmod"]; ?></td>
                    <td><?= $dt["Perfiles"]; ?></td>
                    <td>
                        <a href="index.php?pg=29&ope=edi&idmod=<?=$dt["idmod"]?>" title="Editar">
                            <i class="fa-solid fa-pen-to-square fa-2x text-primary"></i>
                        </a>
                        <a href="index.php?pg=29&ope=eli&idmod=<?=$dt["idmod"]?>" onclick="return eliminar('<?= $dt['nommod'] ?>')" title="Eliminar">
                            <i class="fa-solid fa-trash-can fa-2x text-danger"></i>
                        </a>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>idmod</th>
                    <th>Icono</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Orden</th>
                    <th>Usuarios con acceso</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>