<?php
    require_once ("models/mcuerfac.php");

    $mcuerfac = new mCuerfac();
    $datAll   = $mcuerfac->getAll();                          // Cabecera con JOINs

    // Si hay facturas, traer el detalle de la primera (o la solicitada por GET)
    $nofact  = !empty($datAll) ? $datAll[0]['nofact'] : 0;
    $detalle = $mcuerfac->getDetalle($nofact);               // Items del detalle
    $total   = array_sum(array_column($detalle, 'subtotal'));
?>