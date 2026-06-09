<?php
 require_once("controllers/ccuedgf.php");

?>

<h1 class="display-title">Detalle de Gastos</h1>


<div class="card card-form p-4 mb-5">
    <h4 class="mb-4 text-secondary"><i class="bi bi-receipt me-2"></i>Registrar Movimiento / Detalle</h4>
    <form id="detalleGastoForm" class="row g-3 needs-validation" novalidate>
        <div class="col-md-5">
            <label class="form-label fw-semibold">Seleccionar Gasto Fijo<span class="required-mark">*</span></label>
            <select class="form-select" id="idGastoFijo" required>
                <option value="" selected disabled>Seleccione un gasto...</option>
              
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-semibold">Fecha de Pago<span class="required-mark">*</span></label>
            <input type="date" class="form-control" id="fechaPago" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Monto Pagado<span class="required-mark">*</span></label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="montoPagado" required>
            </div>
        </div>

        <div class="col-md-12">
            <label class="form-label fw-semibold">Observaciones / Soporte</label>
            <textarea class="form-control" id="observaciones" rows="2" placeholder="Ej: Pago realizado por transferencia..."></textarea>
        </div>

        <div class="col-12 mt-4 text-end">
            <button type="submit" class="btn btn-institutional shadow">
                <i class="bi bi-plus-circle me-2"></i>Agregar al Historial
            </button>
        </div>
    </form>
</div>


<div class="table-container shadow-sm">
    <h4 class="mb-4 text-secondary d-flex align-items-center">
        <i class="bi bi-clock-history me-2"></i>Historial de Pagos y Detalles
    </h4>
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Concepto (Gasto)</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
             <tbody id="tableBody">
                <?php if ($datAll) {foreach ($datAll as $dt) { ?>

                    <tr>
                        <td><?= $dt["fecgas"];  ?></td>
                        <td><?= $dt["nomgas"]; ?></td>
                        <td><?= $dt["valor"]; ?></td>
                        <td><?= $dt["nregas"]; ?></td>
                        
                        

                     </tr>

                <?php }} ?>
               
            </tbody>
        </table>
    </div>
</div>