<?php
require_once("controllers/ccuerixg.php");

$datAll = isset($datAll) ? $datAll : [];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIREMC - Gestión de Ingresos y Gastos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { 
            --azul-siremc: #002855; 
            --azul-tabla-suave: #1d3557; 
        }
        body { background-color: #f4f7f9; }
        .card-stats { border: none; border-radius: 15px; transition: 0.3s; }
        .card-stats:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
        .btn-siremc { background-color: var(--azul-siremc); color: white; border: none; }
        .btn-siremc:hover { background-color: #004085; color: white; }
        .status-ganancia { border-left: 8px solid #198754 !important; background-color: #d1e7dd; }
        .status-perdida { border-left: 8px solid #dc3545 !important; background-color: #f8d7da; }
        .text-navy { color: var(--azul-siremc); }
        .text-table-custom { color: var(--azul-tabla-suave) !important; }
        
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Estilos personalizados para los botones de exportación estilo SIREMC */
        .dt-buttons .btn {
            margin-right: 5px;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <?php
    require_once('controllers/misfun.php');
    $misFun = new misFun();

    ?>

<div class="container mt-4">
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body p-4">
            <h5 class="card-title text-navy mb-3 fw-bold">
                <i class="bi bi-pencil-square me-2"></i>Registrar Nuevo Movimiento
            </h5>
            <form id="formMovimiento" method="POST" action="" class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label for="nogas" class="form-label fw-bold small text-muted">No. Registro</label>
                    <input type="number" name="nogas" id="nogas" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label for="tipomov" class="form-label fw-bold small text-muted">Tipo</label>
                    <select name="tipomov" id="tipomov" class="form-select fw-semibold" required>
                        <option value="Gasto" class="text-danger fw-bold">📉 Gasto</option>
                        <option value="Ingreso" class="text-success fw-bold">📈 Ingreso</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="nomgas" class="form-label fw-bold small text-muted">Concepto / Descripción</label>
                    <input type="text" name="nomgas" id="nomgas" class="form-control" placeholder="Ej: Pago mensualidad" required>
                </div>
                <div class="col-md-2">
                    <label_monto for="valgas" class="form-label fw-bold small text-muted">Monto ($)</label_monto>
                    <input type="number" name="valgas" id="valgas" class="form-control" placeholder="Valor" min="1" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-siremc w-100 fw-bold py-2">
                        <i class="bi bi-plus-lg"></i> AGREGAR
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $totalGastos = 0;
    $totalIngresos = 0; 
    
    if(!empty($datAll)){
        foreach($datAll as $g){
            $tipo = isset($g['tipomov']) ? $g['tipomov'] : 'Gasto';
            $valor = isset($g['valgas']) ? $g['valgas'] : 0;
            
            if (strcasecmp(trim($tipo), 'Ingreso') === 0) {
                $totalIngresos += $valor;
            } else {
                $totalGastos += $valor;
            }
        }
    }
    $saldoNeto = $totalIngresos - $totalGastos;
    $claseStatus = ($saldoNeto >= 0) ? 'status-ganancia' : 'status-perdida';
    ?>

    <div class="row g-4 mb-4 text-center">
        <div class="col-md-4">
            <div class="card card-stats p-4 bg-white border-start border-danger border-5 shadow-sm">
                <h6 class="text-muted small fw-bold">TOTAL GASTOS</h6>
                <h2 class="text-danger mb-0 fw-bold">$ <?=number_format($totalGastos, 0, ',', '.');?></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats p-4 bg-white border-start border-success border-5 shadow-sm">
                <h6 class="text-muted small fw-bold">TOTAL INGRESOS</h6>
                <h2 class="text-success mb-0 fw-bold">$ <?=number_format($totalIngresos, 0, ',', '.');?></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats p-4 <?=$claseStatus;?> shadow-sm">
                <h6 class="text-muted small fw-bold">SALDO NETO</h6>
                <h2 class="<?=($saldoNeto >= 0) ? 'text-success' : 'text-danger';?> mb-0 fw-bold">$ <?=number_format($saldoNeto, 0, ',', '.');?></h2>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header bg-white fw-bold text-navy py-3 border-0">
            <span class="fs-5"><i class="bi bi-database border-start-0 me-2"></i>Listado de Transacciones</span>
        </div>
        
        <div class="p-3">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-hover align-middle mb-0 text-center w-100">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 15%;">No. Registro</th>
                            <th scope="col" style="width: 15%;">Tipo</th>
                            <th scope="col" class="text-start" style="width: 40%;">Descripción</th>
                            <th scope="col" class="text-end" style="width: 20%;">Monto</th>
                            <th scope="col" style="width: 10%;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(!empty($datAll)){ 
                            foreach ($datAll as $dt) { 
                                $mNo = $dt["nogas"];
                                $mTipo = isset($dt["tipomov"]) ? $dt["tipomov"] : "Gasto";
                                $mNom = $dt["nomgas"];
                                $mVal = $dt["valgas"];
                                
                                $esIngreso = (strcasecmp(trim($mTipo), 'Ingreso') === 0);
                        ?>
                        <tr>
                            <td><span class="fw-bold text-table-custom"><?=$mNo;?></span></td>
                            <td>
                                <span class="badge <?= $esIngreso ? 'bg-success-subtle text-success border border-success' : 'bg-danger-subtle text-danger border border-danger' ?> px-3 py-2 rounded-pill fw-bold">
                                    <?= $esIngreso ? '📈 Ingreso' : '📉 Gasto' ?>
                                </span>
                            </td>
                            <td class="text-start fw-semibold text-table-custom"><?=$mNom;?></td>
                            <td class="text-end fw-bold <?= $esIngreso ? 'text-success' : 'text-danger' ?>">$ <?=number_format($mVal, 0, ',', '.');?></td>
                            <td>
                                <a href="index.php?page=vcuerixg&nogas=<?=$mNo;?>&operacion=del" onclick="return confirm('¿Estás seguro de eliminar este registro?')" class="btn btn-sm btn-outline-danger border-0 rounded-circle p-2">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer class="text-center mt-5 py-4 text-muted border-top bg-white w-100 position-relative">
    <p class="m-0">SIREMC - <strong>Desarrollado por Laura Dayanna Vela Pérez</strong> &copy; 2026</p>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>

<script>
$(document).ready(function () {
    let table = document.getElementById("myTable");
    if (!table) return;

    // Configuración nativa limpia para DataTables 2.x usando el objeto 'layout'
    $('#myTable').DataTable({
        layout: {
            topStart: {
                buttons: [
                    { 
                        extend: 'copy', 
                        text: '<i class="fas fa-copy"></i> Copiar', 
                        className: 'btn btn-outline-secondary btn-sm' 
                    },
                    { 
                        extend: 'csv', 
                        text: '<i class="fas fa-file-csv"></i> CSV', 
                        className: 'btn btn-outline-warning btn-sm' 
                    },
                    { 
                        extend: 'excel', 
                        text: '<i class="fas fa-file-excel"></i> Excel', 
                        className: 'btn btn-outline-success btn-sm' 
                    },
                    { 
                        extend: 'pdf', 
                        text: '<i class="fas fa-file-pdf"></i> PDF', 
                        className: 'btn btn-outline-danger btn-sm',
                        exportOptions: { columns: [0, 1, 2, 3] }
                    }
                ]
            },
            topEnd: 'search',
            bottomStart: 'info',
            bottomEnd: 'pageLength'
        },
        "pageLength": 10,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": { "sFirst": "<<", "sLast": ">>", "sNext": ">", "sPrevious": "<" },
            "sProcessing": "Procesando..."
        }
    });
});
</script>
</body>
</html>