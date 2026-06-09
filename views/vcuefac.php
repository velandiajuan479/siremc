<?php

?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">




<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-<?php
    echo match ($_GET['msg']) {
        'guardado', 'actualizado', 'eliminado' => 'success',
        default => 'danger'
    };
    ?> alert-dismissible fade show" role="alert">
        <?php
        $mensajes = [
            'guardado' => '✅ Factura guardada correctamente.',
            'actualizado' => '✅ Factura actualizada correctamente.',
            'eliminado' => '✅ Factura eliminada correctamente.',
            'error' => '❌ Error en la operación.'
        ];
        echo $mensajes[$_GET['msg']] ?? 'Operación realizada.';
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>



<div class="card card-form p-4 mb-4">
    <h5 class="mb-3 text-secondary">
        <i class="bi <?php echo $modoEdicion ? 'bi-pencil-square' : 'bi-plus-circle'; ?> me-2"></i>
        <?php echo $modoEdicion ? 'Editar Factura #' . htmlspecialchars($facturaEditar['nofact']) : 'Nueva Factura'; ?>
    </h5>

    <form method="POST" action="index.php?pg=12" class="row g-3 needs-validation" novalidate>

        <?php if ($modoEdicion): ?>
            <input type="hidden" name="accion" value="actualizar">
            <input type="hidden" name="nofact" value="<?php echo htmlspecialchars($facturaEditar['nofact']); ?>">
            <input type="hidden" name="fecha" value="<?php echo htmlspecialchars($facturaEditar['fecha']); ?>">
        <?php else: ?>
            <input type="hidden" name="accion" value="guardar">
        <?php endif; ?>

        <div class="col-md-4">
            <label for="idest" class="form-label">
                ID Estudiante <span class="required-mark">*</span>
            </label>
            <input type="number" class="form-control" id="idest" name="idest" placeholder="Ej: 1001" required min="1"
                value="<?php echo $modoEdicion ? htmlspecialchars($facturaEditar['idest']) : ''; ?>">
            <div class="invalid-feedback">Ingrese el ID del estudiante.</div>
        </div>

        <div class="col-md-4">
            <label for="idemp" class="form-label">
                ID Empleado <span class="required-mark">*</span>
            </label>
            <input type="number" class="form-control" id="idemp" name="idemp" placeholder="Ej: 2001" required min="1"
                value="<?php echo $modoEdicion ? htmlspecialchars($facturaEditar['idemp']) : ''; ?>">
            <div class="invalid-feedback">Ingrese el ID del empleado.</div>
        </div>

        <div class="col-md-4">
            <label for="fecven" class="form-label">
                Fecha Vencimiento
            </label>
            <input type="date" class="form-control" id="fecven" name="fecven"
                value="<?php echo $modoEdicion ? htmlspecialchars($facturaEditar['fecven'] ?? '') : ''; ?>">
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn <?php echo $modoEdicion ? 'btn-warning' : 'btn-institutional'; ?>">
                <i class="bi <?php echo $modoEdicion ? 'bi-check-lg' : 'bi-save'; ?> me-1"></i>
                <?php echo $modoEdicion ? 'Actualizar' : 'Guardar'; ?>
            </button>
            <?php if ($modoEdicion): ?>
                <a href="index.php?pg=12" class="btn btn-outline-secondary ms-2">
                    <i class="bi bi-x-circle me-1"></i> Cancelar
                </a>
            <?php endif; ?>
        </div>
    </form>
</div>



<?php if (!empty($datAll) && $nofact > 0):
    $row = null;
    foreach ($datAll as $f) {
        if ($f['nofact'] == $nofact) {
            $row = $f;
            break;
        }
    }
    if ($row):
        ?>

        <div class="card mb-4 border-primary">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-file-text me-2"></i>Reporte de Factura #
                    <?php echo str_pad($row['nofact'], 4, '0', STR_PAD_LEFT); ?>
                </h5>
            </div>
            <div class="card-body">


                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-secondary border-bottom pb-2 mb-3">
                            <i class="bi bi-person me-2"></i>Datos del Estudiante
                        </h6>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Nombres</label>
                        <p class="fw-semibold mb-0">
                            <?php echo htmlspecialchars($row['nom_est']); ?>
                        </p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Apellidos</label>
                        <p class="fw-semibold mb-0">
                            <?php echo htmlspecialchars($row['ape_est'] . ' ' . ($row['sape_est'] ?? '')); ?>
                        </p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Documento</label>
                        <p class="mb-0">
                            <?php echo htmlspecialchars($row['doc_estudiante']); ?>
                        </p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Grado</label>
                        <p class="mb-0">
                            <?php echo htmlspecialchars($row['grado'] ?? '—'); ?>
                        </p>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-secondary border-bottom pb-2 mb-3">
                            <i class="bi bi-people me-2"></i>Datos del Acudiente
                        </h6>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Nombres</label>
                        <p class="fw-semibold mb-0">
                            <?php echo htmlspecialchars($row['nom_acu']); ?>
                        </p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Apellidos</label>
                        <p class="fw-semibold mb-0">
                            <?php echo htmlspecialchars($row['ape_acu'] . ' ' . ($row['sape_acu'] ?? '')); ?>
                        </p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Documento</label>
                        <p class="mb-0">
                            <?php echo htmlspecialchars($row['doc_acudiente']); ?> (
                            <?php echo htmlspecialchars($row['parentesco']); ?>)
                        </p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Teléfono</label>
                        <p class="mb-0">
                            <?php echo htmlspecialchars($row['tel_acudiente'] ?? '—'); ?>
                        </p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="text-muted small">Email</label>
                        <p class="mb-0">
                            <?php echo htmlspecialchars($row['email_acudiente'] ?? '—'); ?>
                        </p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-secondary border-bottom pb-2 mb-3">
                            <i class="bi bi-receipt me-2"></i>Información de la Factura
                        </h6>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="text-muted small">Número Factura</label>
                        <p class="fw-bold text-primary mb-0 fs-5">#
                            <?php echo str_pad($row['nofact'], 4, '0', STR_PAD_LEFT); ?>
                        </p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="text-muted small">Fecha Emisión</label>
                        <p class="mb-0">
                            <?php echo htmlspecialchars($row['fecha']); ?>
                        </p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="text-muted small">Fecha Vencimiento</label>
                        <p class="mb-0 <?php echo (strtotime($row['fecven'] ?? '') < time()) ? 'text-danger fw-bold' : ''; ?>">
                            <?php echo htmlspecialchars($row['fecven'] ?? '—'); ?>
                        </p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="text-muted small">Generado por</label>
                        <p class="mb-0"><i class="bi bi-person-badge me-1"></i>
                            <?php echo htmlspecialchars($row['empleado']); ?>
                        </p>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Cant.</th>
                                <th>Concepto</th>
                                <th class="text-end">Valor Unit.</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($detalle)): ?>
                                <?php foreach ($detalle as $item): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $item['cant']; ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($item['concepto']); ?>
                                        </td>
                                        <td class="text-end">$
                                            <?php echo number_format($item['valor'], 2, ',', '.'); ?>
                                        </td>
                                        <td class="text-end fw-semibold">$
                                            <?php echo number_format($item['subtotal'], 2, ',', '.'); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        No hay conceptos registrados.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot class="table-group-divider">
                            <tr class="table-primary">
                                <td colspan="3" class="text-end"><strong>SALDO A PAGAR:</strong></td>
                                <td class="text-end"><strong class="fs-4 text-primary">$
                                        <?php echo number_format($total, 2, ',', '.'); ?>
                                    </strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <p class="text-end mt-2 mb-0" style="font-size:0.8rem; color:#999;">
                    <i class="bi bi-clock me-1"></i>Generado el
                    <?php echo date('d/m/Y \a \l\a\s H:i'); ?>
                </p>
            </div>
        </div>

    <?php endif; endif; ?>



<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-table me-2"></i>Listado de Facturas</h5>
        <span class="badge bg-secondary" id="totalRegistros">0 registros</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tablaFacturas" class="table table-striped table-hover align-middle" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th># Factura</th>
                        <th>Fecha</th>
                        <th>Vencimiento</th>
                        <th>Estudiante</th>
                        <th>Documento</th>
                        <th>Grado</th>
                        <th>Acudiente</th>
                        <th>Teléfono</th>
                        <th class="text-center no-sort">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($datAll)): ?>
                        <?php foreach ($datAll as $dt): ?>
                            <tr>
                                <td class="fw-semibold">#
                                    <?php echo str_pad($dt['nofact'], 4, '0', STR_PAD_LEFT); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($dt['fecha']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($dt['fecven'] ?? '—'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($dt['nom_est'] . ' ' . $dt['ape_est']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($dt['doc_estudiante']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($dt['grado'] ?? '—'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($dt['nom_acu'] . ' ' . $dt['ape_acu']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($dt['tel_acudiente'] ?? '—'); ?>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?pg=12&nofact=<?php echo $dt['nofact']; ?>"
                                        class="btn btn-sm btn-info me-1" title="Ver Reporte">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="index.php?pg=12&editar=<?php echo $dt['nofact']; ?>"
                                        class="btn btn-sm btn-warning me-1" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form method="POST" action="index.php?pg=12" class="d-inline"
                                        onsubmit="return confirm('¿Eliminar factura #<?php echo $dt['nofact']; ?>?')">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="nofact" value="<?php echo $dt['nofact']; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                No hay facturas registradas.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        var tabla = $('#tablaFacturas').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            responsive: true,
            order: [[0, 'desc']],
            columnDefs: [
                { targets: 'no-sort', orderable: false }
            ],
            dom: '<"row mb-3"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="bi bi-clipboard"></i> Copiar',
                    className: 'btn btn-sm btn-outline-secondary',
                    exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7] }
                },
                {
                    extend: 'excel',
                    text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                    className: 'btn btn-sm btn-outline-success',
                    exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7] },
                    title: 'Facturas - SIREMC'
                },
                {
                    extend: 'pdf',
                    text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                    className: 'btn btn-sm btn-outline-danger',
                    exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7] },
                    title: 'Facturas - SIREMC'
                },
                {
                    extend: 'print',
                    text: '<i class="bi bi-printer"></i> Imprimir',
                    className: 'btn btn-sm btn-outline-primary',
                    exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7] },
                    title: 'Facturas - SIREMC'
                }
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'Todos']],
            drawCallback: function () {
                $('#totalRegistros').text(this.api().data().length + ' registros');
            }
        });
    });
</script>