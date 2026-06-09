<?php
  require_once("controllers/ccofvig.php");
?>

<h1 class="display-title">Vigencia</h1>

<div class="card card-form p-4 mb-5">
    <h4 class="mb-4 text-secondary">
        <i class="bi bi-calendar-check me-2"></i>Nuevo Registro
    </h4>

    <form method="POST" id="vigenciaForm" class="row g-3 needs-validation" novalidate>
        <!-- Número de Vigencia -->
        <div class="col-md-4">
            <label class="form-label fw-semibold" for="novig">
                Número de Vigencia<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="novig" name="novig" placeholder="Ej: 2024001" required>
            <div class="invalid-feedback">El número de vigencia es obligatorio.</div>
        </div>

        <!-- Fecha Inicial -->
        <div class="col-md-4">
            <label class="form-label fw-semibold" for="fecini">
                Fecha Inicial<span class="required-mark">*</span>
            </label>
            <input type="date" class="form-control" id="fecini" name="fecini" required>
            <div class="invalid-feedback">La fecha inicial es obligatoria.</div>
        </div>

        <!-- Fecha Final -->
        <div class="col-md-4">
            <label class="form-label fw-semibold" for="fechfin">
                Fecha Final<span class="required-mark">*</span>
            </label>
            <input type="date" class="form-control" id="fechfin" name="fechfin" required>
            <div class="invalid-feedback">La fecha final es obligatoria.</div>
        </div>

        <!-- Activo -->
        <div class="col-md-4">
            <label class="form-label d-block fw-semibold">
                Activo<span class="required-mark">*</span>
            </label>
            <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="act" id="act_si" value="1" required>
                <label class="form-check-label" for="act_si">Sí</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="act" id="act_no" value="0" required>
                <label class="form-check-label" for="act_no">No</label>
            </div>
            <div class="invalid-feedback d-block" id="act-feedback" style="display:none!important"></div>
        </div>

        <!-- Botones de acción -->
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary me-2" id="btnGuardar">
                <i class="bi bi-floppy me-1"></i>Guardar
            </button>
            <button type="reset" class="btn btn-secondary" id="btnLimpiar">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Limpiar
            </button>
        </div>
    </form>
</div>

<!-- Listado -->
<div class="card p-4">
    <h4 class="mb-4 text-secondary">
        <i class="bi bi-table me-2"></i>Listado de Vigencias Registradas
    </h4>
    <div class="table-responsive">
        <table class="table table-hover align-middle" id="tablaVigencias">
            <thead class="table-light">
                <tr>
                    <th scope="col">No. Vigencia</th>
                    <th scope="col">Fecha Inicial</th>
                    <th scope="col">Fecha Final</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbodyVigencias">
                <?php foreach ($vigencias as $vigencia): ?>
                    <tr>
                        <td><?= htmlspecialchars($vigencia['novig']) ?></td>
                        <td><?= htmlspecialchars($vigencia['finiv']) ?></td>
                        <td><?= htmlspecialchars($vigencia['ffinv']) ?></td>
                        <td>
                            <?php if ($vigencia['actv'] == 1): ?>
                                <span class="badge bg-success">Sí</span>
                            <?php else: ?>
                                <span class="badge bg-danger">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>    
    </div>
</div>
