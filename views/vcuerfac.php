<?php
    require_once ("controllers/ccuerfac.php");
?>
<?php
// ── Datos desde la BD (vienen del controlador tras JOINs) ──────────
$datosColegio = [
    'colegio'       => 'SIREMC Institución Educativa',
    'nit'           => '900.123.456-7',
    'telefono'      => '601 234 5678',
    'direccion'     => 'Calle 10 # 5 - 20, Bogotá',
    'email_colegio' => 'info@siremc.edu.co',
];

if (!empty($datAll)) {
    $row = $datAll[0];

    $factura = array_merge($datosColegio, [
        'nofact'              => $row['nofact'],
        'fecha'               => $row['fecha'],
        'estudiante'          => $row['estudiante'],
        'documento'           => $row['doc_estudiante'],
        'grado'               => $row['grado'] ?? '—',
        'acudiente'           => $row['acudiente'],
        'documento_acudiente' => $row['doc_acudiente'],
        'telefono_acudiente'  => $row['tel_acudiente']  ?? '—',
        'email_acudiente'     => $row['email_acudiente'] ?? '—',
        'parentesco'          => $row['parentesco'],
        'empleado'            => $row['empleado'],
    ]);
} else {
    $factura = array_merge($datosColegio, [
        'nofact'              => 0,
        'fecha'               => date('Y-m-d'),
        'estudiante'          => 'Sin registros en la BD',
        'documento'           => '—',
        'grado'               => '—',
        'acudiente'           => '—',
        'documento_acudiente' => '—',
        'telefono_acudiente'  => '—',
        'email_acudiente'     => '—',
        'parentesco'          => '—',
        'empleado'            => '—',
    ]);
}

if (!isset($detalle)) $detalle = [];
if (!isset($total))   $total   = 0;
?>

<main class="container mt-5">

    <!-- Datos del emisor -->
    <div class="card card-form p-4 mb-3">
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Institución</label>
                <p><strong><?= htmlspecialchars($factura['colegio']) ?></strong></p>
            </div>
            <div class="col-md-6 mb-2">
                <label>NIT</label>
                <p><?= htmlspecialchars($factura['nit']) ?></p>
            </div>
            <div class="col-md-6 mb-2">
                <label>Dirección</label>
                <p><?= htmlspecialchars($factura['direccion']) ?></p>
            </div>
            <div class="col-md-6 mb-2">
                <label>Teléfono</label>
                <p><?= htmlspecialchars($factura['telefono']) ?></p>
            </div>
            <div class="col-md-6 mb-2">
                <label>Email</label>
                <p><?= htmlspecialchars($factura['email_colegio']) ?></p>
            </div>
            <div class="col-md-3 mb-2">
                <label>Número de Factura</label>
                <p><?= str_pad($factura['nofact'], 4, '0', STR_PAD_LEFT) ?>/2026</p>
            </div>
            <div class="col-md-3 mb-2">
                <label>Fecha</label>
                <p><?= htmlspecialchars($factura['fecha']) ?></p>
            </div>
        </div>
    </div>

    <!-- Datos del estudiante / acudiente -->
    <div class="card card-form p-4 mb-3">
        <h5 class="mb-3">Estudiante / Acudiente</h5>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Estudiante</label>
                <p><?= htmlspecialchars($factura['estudiante']) ?></p>
            </div>
            <div class="col-md-3 mb-2">
                <label>Documento</label>
                <p><?= htmlspecialchars($factura['documento']) ?></p>
            </div>
            <div class="col-md-3 mb-2">
                <label>Grado</label>
                <p><?= htmlspecialchars($factura['grado']) ?></p>
            </div>
            <div class="col-md-6 mb-2">
                <label>Acudiente</label>
                <p><?= htmlspecialchars($factura['acudiente']) ?></p>
            </div>
            <div class="col-md-3 mb-2">
                <label>Documento Acudiente</label>
                <p><?= htmlspecialchars($factura['documento_acudiente']) ?> (<?= htmlspecialchars($factura['parentesco']) ?>)</p>
            </div>
            <div class="col-md-3 mb-2">
                <label>Teléfono Acudiente</label>
                <p><?= htmlspecialchars($factura['telefono_acudiente']) ?></p>
            </div>
            <div class="col-md-6 mb-2">
                <label>Email Acudiente</label>
                <p><?= htmlspecialchars($factura['email_acudiente']) ?></p>
            </div>
            <div class="col-md-6 mb-2">
                <label>Empleado que generó</label>
                <p><?= htmlspecialchars($factura['empleado']) ?></p>
            </div>
        </div>
    </div>

    <!-- Tabla de conceptos -->
    <div class="table-container mt-4">
        <h5 class="mb-3">Detalle de Conceptos</h5>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cant.</th>
                        <th>Concepto</th>
                        <th class="text-end">Valor Unit.</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($detalle)): ?>
                        <?php foreach ($detalle as $item): ?>
                        <tr>
                            <td><?= $item['cant'] ?></td>
                            <td><?= htmlspecialchars($item['concepto']) ?></td>
                            <td class="text-end">$ <?= number_format($item['valor'], 2, ',', '.') ?></td>
                            <td class="text-end">$ <?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay conceptos registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>TOTAL A PAGAR:</strong></td>
                        <td class="text-end"><strong>$ <?= number_format($total, 2, ',', '.') ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <p class="text-end mt-2" style="font-size:0.8rem; color:#999;">
            Generado el <?= date('d/m/Y \a \l\a\s H:i') ?>
        </p>
    </div>
</main>