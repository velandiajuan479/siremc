<?php
    // Incluimos tu controlador que se encarga de listar y procesar
    require_once("controllers/ccuempgs.php");
?>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <p class="text-muted">Módulo para la administración de periodos financieros y carga de transacciones masivas.</p>
            <hr>
        </div>
    </div>

    <div class="alert alert-info border-0 shadow-sm mb-4" role="alert">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="bi bi-clipboard2-check-fill fs-3"></i>
            </div>
            <div>
                <h5 class="alert-heading mb-1">Guía de Importación</h5>
                <p class="mb-2">El sistema requiere un formato específico para procesar los pagos correctamente.</p>
                <a href="formatos/plantilla_pagos.xlsx" class="btn btn-sm btn-info text-white">
                    <i class="bi bi-file-earmark-spreadsheet me-1"></i> Descargar Plantilla Oficial
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body p-4">
            <form action="index.php?pg=21" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="ope" value="cargar_plano">

                <div class="mb-4 border-bottom pb-2">
                    <h4 class="text-secondary fs-5">
                        <i class="bi bi-gear-wide-connected me-2"></i> Configuración de Vigencia y Archivo
                    </h4>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="novig" class="form-label fw-bold small text-uppercase">Número de Vigencia <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-hash"></i></span>
                            <input type="text" id="novig" name="novig" class="form-control" placeholder="Ej. 2026" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="fecini" class="form-label fw-bold small text-uppercase">Fecha Inicial <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-calendar-event"></i></span>
                            <input type="date" id="fecini" name="fecini" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="fechfin" class="form-label fw-bold small text-uppercase">Fecha Final <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-calendar-check"></i></span>
                            <input type="date" id="fechfin" name="fechfin" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-uppercase d-block">Estado de Vigencia <span class="text-danger">*</span></label>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="act" id="act_si" value="1" checked required>
                                <label class="form-check-label" for="act_si">Activa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="act" id="act_no" value="0">
                                <label class="form-check-label" for="act_no">Inactiva</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label for="archivo_pagos" class="form-label fw-bold small text-uppercase">Subir Reporte Masivo (Archivo Plano)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-cloud-arrow-up"></i></span>
                            <input type="file" id="archivo_pagos" name="archivo_pagos" class="form-control" accept=".csv, .txt">
                        </div>
                        <div class="form-text small text-muted"><i class="bi bi-info-circle me-1"></i> Opcional. Suba el archivo plano (.csv) si desea procesar un lote del banco.</div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 text-end">
                        <button type="reset" class="btn btn-outline-secondary me-2 px-4">
                            <i class="bi bi-arrow-left-short"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary px-4" style="background-color: #1a374d; border: none;">
                            <i class="bi bi-send-check me-2"></i> Procesar Carga
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <h4 class="text-secondary fs-5">
                <i class="bi bi-list-task me-2"></i> Historial de Cargas Masivas de Pagos (Leídos de la BD)
            </h4>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">N° Factura / Vigencia</th>
                        <th>Fecha de Carga</th>
                        <th>Estado de la Carga</th>
                        <th>Empleado Responsable</th>
                        <th class="text-center" style="width: 120px;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php 
                    if (isset($datAll) && is_array($datAll) && count($datAll) > 0): 
                        foreach ($datAll as $dt): 
                    ?>
                        <tr>
                            <td class="ps-4 fw-bold text-dark">
                                <?= htmlspecialchars($dt["nofact"]); ?>
                            </td>
                            <td><?= htmlspecialchars($dt["fecha"]); ?></td>
                            <td>
                                <?php if($dt["idest"] == 1): ?>
                                    <span class="badge rounded-pill bg-success-subtle text-success px-3">Activa</span>
                                <?php else: ?>
                                    <span class="badge rounded-pill bg-danger-subtle text-danger px-3">Inactiva</span>
                                <?php endif; ?>
                            </td>
                            <td><span class="text-muted">ID Empleado: <?= htmlspecialchars($dt["idemp"]); ?></span></td>
                            <td class="text-center">
                                <a href="index.php?pg=21&ope=edit&id=<?= $dt['nofact']; ?>" class="text-warning me-3" title="Editar">
                                    <i class="fa-regular fa-pen-to-square fs-5"></i>
                                </a>
                                <a href="index.php?pg=21&ope=eli&id=<?= $dt['nofact']; ?>" class="text-danger" title="Eliminar" onclick="return confirm('¿Está seguro de eliminar este registro?');">
                                    <i class="fa-regular fa-trash-can fs-5"></i>
                                </a>
                            </td>
                        </tr>
                    <?php 
                        endforeach; 
                    else: 
                    ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-folder-x fs-3 d-block mb-2"></i> No se encontraron registros guardados en la base de datos.
                            </td>
                        </tr>
                    <?php 
                    endif; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>