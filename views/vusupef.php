<?php
    require_once("controllers/cusupef.php");
?>


<h1 class="display-title">Perfiles</h1>

<div class="card card-form p-4 mb-5">
    <h4 class="mb-4 text-secondary"><i class="bi bi-shield-lock me-2"></i>Nuevo Registro</h4>
    <form id="perfilForm" class="row g-3 needs-validation" novalidate>

        <div class="col-md-6">
            <label for="idpef" class="form-label fw-semibold">
                ID del perfil<span class="required-mark">*</span>
            </label>
             <input type="number" id="idpef" name="idpef" required>
        </div>


        <div class="col-md-6">
            <label for="nompef" class="form-label fw-semibold">
                Nombre del Perfil<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="nompef" name="nompef"
                placeholder="Ej: Administrador" required>
        </div>

        <div class="col-md-6">
            <label for="pgprin" class="form-label fw-semibold">
                Página Principal<span class="required-mark">*</span>
            </label>
        <input type="number" id="pgprin" name="pgprin" required>
        </div>

         <div class="col-md-6">
            <label for="idmod" class="form-label fw-semibold">
                ID del modulo<span class="required-mark">*</span>
            </label>
             <input type="number" id="idmod" name="idmod" required>
        </div>

        <div class="col-12 mt-4 text-end">
            <button type="submit" class="btn btn-institutional shadow">
                <i class="bi bi-save me-2"></i>Registrar Perfil
            </button>
        </div>

    </form>
</div>

<div class="table-container shadow-sm">
    <h4 class="mb-4 text-secondary d-flex align-items-center">
        <i class="bi bi-table me-2"></i>Listado de Perfiles Registrados
    </h4>
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle" id="perfilTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Perfil</th>
                    <th>Página Principal</th>
                    <th>ID del modulo</th>
                </tr>
            </thead>
        <tbody id="tablebody">
            <?php if (isset($datAll) && $datAll) {
                    foreach ($datAll as $dt) { ?>
                        <tr>
                            <td><?= $dt["idpef"]; ?></td>
                            <td><?= $dt["nompef"]; ?></td>
                            <td><?= $dt["pgprin"]; ?></td>
                            <td><?= $dt["idmod"] ; ?></td>
                            <td>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay páginas registradas.</td>
                    </tr>
                <?php } ?>
        </tbody>
        </table>
    </div>
</div>
