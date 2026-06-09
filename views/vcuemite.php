<?php
require_once("controllers/ccuemite.php");
?>

<div class="card card-form p-4">
    <input type="file" class=" form-control">
    <h5 class="text-secondary pt-3">Recomendaciones <span class="required-mark">*</span></h5>

    <ul class="">
        <li>Formato .xsx o .txt</li>
        <li>Fila con encabezados</li>
        <li>Sin celdas combinadas</li>
        <li>El nomrbre del archivo no debe contener caracteres especiales</li>
        <li>Maximo de filas 500</li>
        <li>Maximo tamaño de 10MB</li>
    </ul>

    <form name="formCuemite" action="#" novalidate method="POST" class="row g-2 mb-3">

        <div class="col-md-6">
            <label class="form-label fw-semibold" for="noitem">Nº iteam <span class="required-mark">*</span></label>
            <input type="text" id="noitem" name="noitem" class="form-control" value="<?php if ($dton) echo $dton[0]["noitem"]; ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold" for="novig">Nº vigilancia <span class="required-mark">*</span></label>
            <input type="text" id="novig" name="novig" class="form-control" value="<?php if ($dton) echo $dton[0]["novig"]; ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold" for="valor">Valor</label>
            <input type="text" id="valor" name="valor" class="form-control" value="<?php if ($dton) echo $dton[0]["valor"]; ?>">
        </div>

        <div class="text-end mt-3">
            <input type="hidden" id="noitval" name="noitval" value="<?php if ($dton) echo $dton[0]["noitval"]; ?>"><!-- PK tabla itemval-->
            <input type="hidden" name="ope" value="save">
            <button type="submit" class="btn btn-institutional shadow"> <i class="bi bi-save me-2"></i> Regristrar</button>
        </div>
    </form>
</div>

<br>
<div class="table-container mt-4">
    <h2 class="text-secondary"><i class="bi bi-bar-chart-line"></i> Items Validados</h2>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped">

            <thead>
                <tr class="">
                    <th>Codigo Iteam Valor</th>
                    <th>Nº iteam</th>
                    <th>Nº vigilancia</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tablebody">
                <!-- datos a mostrar tabla(itemval) -->
                <?php if ($datAll) {
                    foreach ($datAll as $dt) { ?>
                        <tr>
                            <td><?= $dt["noitval"]; ?></td>
                            <td><?= $dt["noitem"]; ?></td>
                            <td><?= $dt["novig"]; ?></td>
                            <td><?= $dt["valor"]; ?></td>
                            <td>
                                <a href="index.php?pg=23&ope=edi&noitval=<?= $dt["noitval"]; ?>">
                                    <i class="fa-regular fa-pen-to-square fa-2x"></i>
                                </a>

                                <a href="index.php?pg=23&ope=eli&noitval=<?= $dt["noitval"]; ?>" onclick="return eliminar('<?= $dt['noitval']; ?>')">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>

                <?php }
                } ?>

            <tfoot>
                <tr class="">
                    <th>Codigo Iteam Valor</th>
                    <th>Nº iteam</th>
                    <th>Nº vigilancia</th>
                    <th>Valor</th>
                </tr>
            </tfoot>

            </tbody>

        </table>
    </div>
</div>