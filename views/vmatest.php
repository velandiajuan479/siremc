<?php
require_once("controllers/cmatest.php");
?>

<div class="card card-form p-4">
    <h4 class="mb-4 text-secondary"><i class="bi bi-person-plus me-2"></i>Nuevo Estudiante</h4>
    <form name="fmr1" method="POST" action="" enctype="multipart/form-data" class="row">
        <div class="col-md-6">
            <label for="nomper">Nombre<span class="required-mark">*</span></label>
            <input type="text" name="nomper" class="form-control" id="nomper" required value="<?php if ($dtOn) echo $dtOn[0]['nomper']; ?>" placeholder="Ej: Juan Andres">
        </div>
        <div class="col-md-6">
            <label for="papeper">Primer Apellido<span class="required-mark">*</span></label>
            <input type="text" name="papeper" class="form-control" id="papeper" required value="<?php if ($dtOn) echo $dtOn[0]['papeper']; ?>" placeholder="Ej: Perez">
        </div>
        <div class="col-md-6">
            <label for="sapeper">Segundo Apellido<span class="required-mark">*</span></label>
            <input type="text" name="sapeper" class="form-control" id="sapeper" required value="<?php if ($dtOn) echo $dtOn[0]['sapeper']; ?>" placeholder="Ej: Rojas">
        </div>

        <div class="col-md-6">
            <label for="tipdper">Tipo de Documento<span class="required-mark">*</span></label>
            <select name="tipdper" id="tipdper" class="form-control form-select">
                <?php if ($datTdc) {
                    foreach ($datTdc as $dt) { ?>
                        <option value="<?= $dt['idval']; ?>" <?php if ($dtOn and $dtOn[0]['tipdper'] == $dt['idval']) echo "selected"; ?>><?= $dt['nomval']; ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="nuiper">No. de Documento<span class="required-mark">*</span></label>
            <input type="text" name="nuiper" class="form-control" id="nuiper" required value="<?php if ($dtOn) echo $dtOn[0]['nuiper']; ?>" placeholder="C.C. / T.I." min="111111" max="99999999999">
        </div>
        <div class="col-md-6">
            <label for="fnacper">Fecha de Nacimiento<span class="required-mark">*</span></label>
            <input type="date" name="fnacper" class="form-control" id="fnacper" required value="<?php if ($dtOn) echo $dtOn[0]['fnacper']; ?>">
        </div>
        <div class="col-md-4">
            <label for="aleper">Alergias<span class="optional-badge"></span></label>
            <textarea name="aleper" id="aleper" class="form-control" placeholder="Por favor ingrese alergías que padezca, sino las tienen deje este campo en blanco" <?php if ($dtOn) echo $dtOn[0]['aleper']; ?>></textarea>
        </div>
        <div class="col-md-4">
            <label for="rhper">Tipo de RH<span class="required-mark">*</span></label>
            <select id="rhper" name="rhper" class="form-select" required>
                <option value="">Seleccione una opción...</option>
                <?php if ($datRH) {
                    foreach ($datRH as $dr) { ?>
                        <option value="<?= $dr["idval"]; ?>" <?php if ($dtOn and $dtOn[0]['rhper'] == $dr['idval']) echo "selected"; ?>><?= $dr["nomval"]; ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="emaper">Email<span class="required-mark">*</span></label>
            <input type="email" name="emaper" class="form-control" id="emaper" required value="<?php if ($dtOn) echo $dtOn[0]['emaper']; ?>" placeholder="correo@ejemplo.com">
        </div>

        <div class="col-md-4">
            <label for="celcper">No. Celular <span class="optional-badge">(Opcional)</span></label>
            <input type="tel" name="celcper" class="form-control" id="celcper" placeholder="300 000 0000" value="<?php if ($dtOn) echo $dtOn[0]['celcper']; ?>">
        </div>

        <div class="col-md-6">
            <label for="dircper">Dirección de Residencia<span class="required-mark">*</span></label>
            <input type="text" name="dircper" class="form-control" id="dircper" required value="<?php if ($dtOn) echo $dtOn[0]['dircper']; ?>" placeholder="Calle 00 # 00 - 00">
        </div>

        <div class="col-md-6">
            <label for="ubidirc">Ciudad<span class="required-mark">*</span></label>
            <select name="ubidirc" class="form-select" id="ubidirc" required>
                <option value="" selected disabled>Seleccione un municipio...</option>
                <?php if ($datUbi) {
                    foreach ($datUbi as $dr) { ?>
                        <option value="<?= $dr["codubi"]; ?>" <?php if ($dtOn and $dtOn[0]['ubidirc'] == $dr['codubi']) echo "selected"; ?>><?= $dr["mn"]; ?> - <?= $dr["dp"]; ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="fotoper">Foto</label>
            <input type="file" name="fotoper" id="fotoper" class="form-control">
        </div>
        <div class="col-12 mt-4 text-end">
            <input type="hidden" name="idper" id="idper" value="<?php if ($dtOn) echo $dtOn[0]['idper']; ?>">
            <input type="hidden" name="ope" id="ope" value="save">
            <button type="submit" class="btn btn-institutional shadow">
                <i class="bi bi-save me-2"></i>Registrar Estudiante
            </button>
        </div>
    </form>
</div>
<div class="table-container mt-4">
    <h5 class="mb-3">Listado de Estudiantes</h5>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if ($datAll) {
                    foreach ($datAll as $dt) { ?>
                        <tr>
                            <td><?= $dt["nomper"] . " " . $dt["papeper"] . " " . $dt["sapeper"]; ?> RH: <?= $dt["rh"]; ?></td>
                            <td><?= $dt["tipo"]; ?> <?= $dt["nuiper"]; ?></td>
                            <td><?= $dt["emaper"]; ?></td>
                            <td><?= $dt["nuiper"]; ?></td>
                            <td>
                                <a href="index.php?pg=2&ope=edi&idper=<?= $dt['idper']; ?>">
                                    <i class="fa-regular fa-pen-to-square fa-2x text-primary"></i>
                                </a>
                                <a href="index.php?pg=2&ope=eli&idper=<?= $dt['idper']; ?>"
                                    onclick="return eliminar('<?= $dt["nomper"] . " " . $dt["papeper"] . " " . $dt["sapeper"]; ?>');">
                                    <i class="fa-regular fa-trash-can fa-2x"></i>
                                </a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>