<?php
require_once("controllers/ccofcof.php");
?>

<div class="card card-form p-4">
    <h5 class="mb-3">
        <i class="bi bi-gear-fill me-2"></i>
        <?php echo ($dtOne) ? 'Editar Configuración' : 'Nuevo Registro'; ?>
    </h5>

    <form name="fmr1" method="POST" action="#" class="row">
        <input type="hidden" name="nocnf" id="nocnf"
               value="<?php if ($dtOne) echo $dtOne[0]['nocnf']; ?>">

        <div class="col-md-6">
            <label for="nomcnf" class="form-label fw-semibold">
                Nombre de Empresa<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="nomcnf" name="nomcnf" required
                   placeholder="Ej: SIREMC S.A.S."
                   value="<?php if ($dtOne) echo htmlspecialchars($dtOne[0]['nomcnf']); ?>">
        </div>

        <div class="col-md-6">
            <label for="nomescnf" class="form-label fw-semibold">
                NIT<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="nomescnf" name="nomescnf" required
                   placeholder="Ej: 900123456-7"
                   value="<?php if ($dtOne) echo htmlspecialchars($dtOne[0]['nomescnf']); ?>">
        </div>

        <div class="col-md-6">
            <label for="telcnf" class="form-label fw-semibold">
                Teléfono
            </label>
            <input type="text" class="form-control" id="telcnf" name="telcnf"
                   placeholder="Ej: 3000000000"
                   value="<?php if ($dtOne) echo htmlspecialchars($dtOne[0]['telcnf']); ?>">
        </div>

        <div class="col-md-6">
            <label for="dircnf" class="form-label fw-semibold">
                Dirección<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="dircnf" name="dircnf" required
                   placeholder="Ej: Calle 10 # 5-20, Bogotá"
                   value="<?php if ($dtOne) echo htmlspecialchars($dtOne[0]['dircnf']); ?>">
        </div>

        <div class="col-md-6">
            <label for="logocnf" class="form-label fw-semibold">
                Logo (URL o ruta)
            </label>
            <input type="text" class="form-control" id="logocnf" name="logocnf"
                   placeholder="https://misitio.com/logo.png"
                   value="<?php if ($dtOne) echo htmlspecialchars($dtOne[0]['logocnf']); ?>">
        </div>

        <div class="col-md-6">
            <label for="tiecnf" class="form-label fw-semibold">
                Descripción / Tipo de Empresa
            </label>
            <input type="text" class="form-control" id="tiecnf" name="tiecnf"
                   placeholder="Breve descripción del sistema o empresa..."
                   value="<?php if ($dtOne) echo htmlspecialchars($dtOne[0]['tiecnf']); ?>">
        </div>

        <div class="col-12 mt-4 text-end">
            <input type="hidden" name="ope" value="save">
            <?php if ($dtOne): ?>
                <a href="index.php?pg=34" class="btn btn-secondary me-2">
                    <i class="bi bi-x-circle me-1"></i>Cancelar
                </a>
            <?php endif; ?>
            <button type="submit" class="btn btn-institutional">
                <i class="bi bi-save me-2"></i>
                <?php echo ($dtOne) ? 'Actualizar Registro' : 'actualizar'; ?>
            </button>
        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h5 class="mb-3">
        <i class="bi bi-table me-2">Configuraciones Registradas</i> 
    </h5>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Empresa</th>
                    <th>NIT</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                <?php if (isset($datAll) && $datAll) {
                    foreach ($datAll as $dt) { ?>
                        <tr>
                            <td><?= $dt['nocnf']; ?></td>
                            <td><?= htmlspecialchars($dt['nomcnf']); ?></td>
                            <td><?= htmlspecialchars($dt['nomescnf'] ?? '—'); ?></td>
                            <td><?= htmlspecialchars($dt['telcnf']   ?? '—'); ?></td>
                            <td><?= htmlspecialchars($dt['dircnf']   ?? '—'); ?></td>
                            <td><?= htmlspecialchars($dt['tiecnf']   ?? '—'); ?></td>
                            <td>
                                <a href="index.php?pg=34&ope=edi&nocnf=<?= $dt['nocnf']; ?>">
                                    <i class="fa-solid fa-regular fa-pen-to-square fa-2x"></i>
                                </a>
                                <a href="index.php?pg=34&ope=eli&nocnf=<?= $dt['nocnf']; ?>"
                                   onclick="return eliminar('nocnf');">
                                    <i class="fa-solid fa-regular fa-trash-can fa-2x"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }
                    } ?>
            </tbody>
        </table>
    </div>
</div>

