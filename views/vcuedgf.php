<?php
 require_once("controllers/ccuedgf.php");
?> 



<div class="card card-form p-4">
    <h4 class="mb-4 text-secondary"><i class="bi bi-receipt me-2"></i>Registrar Movimiento / Detalle</h4>
    
    <form name="frmreg1" method="POST" action="#" class="row" >

    
        <div class="col-md-6 mb-4">
            <label for="nomgas">Nombre del gasto</label> 
            <input type="text" name="nomgas" id="nomgas" class="form-control
            " required value="<?php if ($dtOn) echo $dtOn[0]['nomgas']; ?>" placeholder="Arriendo">
        </div>


        <div class="col-md-3 mb-3">
            <label for="fecgas">Fecha del gasto</label> 
            <input type="date" name="fecgas" id="fecgas" class="form-control
            " required value="<?php if ($dtOn) echo $dtOn[0]['fecgas']; ?>">
        </div>
            
        
             
        <div class="col-md-3">
            <label for="valor">Valor</label> 
            <input type="number" name="valor" id="valor" class="form-control
            " required value="<?php if ($dtOn) echo $dtOn[0]['valor']; ?>" placeholder="1.000.000">
        </div>


         <div class="col-12 mt-4 text-end">
            <input type="hidden" name="nregas" id="nregas" value="<?php if ($dtOn) echo $dtOn[0]['nregas']; ?>">
            <button type="submit" name="ope" value="save" class="btn btn-institutional shadow">
                <i class="bi bi-plus-circle me-2"></i>Guardar
            </button>
            </div>
    </form>
</div>
            


<div class="table-container mt-4">
    <h5 class="mb-4 text-secondary d-flex align-items-center">
        <i class="bi bi-clock-history me-2"></i>Historial de Pagos y Detalles
    </h5>
    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if ($datAll) { foreach ($datAll as $dt) { ?>
                    <tr>
                        <td><?= $dt["fecgas"]; ?></td>
                        <td><?= $dt["nomgas"]; ?></td>
                        <td><?= $dt["valor"]; ?></td>
                        <td><?= $dt["nregas"]; ?></td>
                        <td>

                            <a href="index.php?pg=16&ope=edi&nregas=<?=$dt['nregas'];?>">
                            <i class="fa-regular fa-pen-to-square me-2" style="
                            cursor: pointer;"></i>
                            </a>


                            <a href="index.php?pg=16&ope=eli&nregas=<?=$dt['nregas'];?>" onclick='return eliminar(<?= json_encode($dt["nomgas"]); ?>);'>
                            <i class="fa-regular fa-trash-can" style="cursor: pointer; color: #dc3545;"></i>
                            </a>



                        </td>
                    </tr>
                <?php }} ?>
            </tbody>

        <tfoot>
                <tr>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            
        </table>
    </div>
</div>