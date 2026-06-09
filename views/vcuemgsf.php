<?php
require_once("controllers/ccuemgsf.php");
?>


<div class="card card-form p-4">
    <form action="#" method="POST" name="frmgsf" class="row">
        <div class="cold-md-4 mb-3">
            <label for="archivo"> Archivo CSV </label>
            <input type="file" name="archivo" id="archivo" class="form-control" accept=".csv">
        </div>

        <div class="col-md-4 mb-3">
            <label for="fecgas">Fecha</label>
            <input type="text" name="fecgas" id="fecgas" class="form-control" value="<?php if ($dtOne) echo $dtOne[0]['fecgas']; ?>">

        </div>
        <div class="col-md-4 mb-3">
            <label for="nomgas">Nombre</label>
            <input type="text" name="nomgas" id="nomgas" class="form-control" value="<?php if ($dtOne) echo $dtOne[0]['nomgas']; ?>">

        </div>
        <div class="col-md-4 mb-3">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control" value="<?php if ($dtOne) echo $dtOne[0]['valor']; ?>">
        </div>

        <div class="row align-items-center">
            <div class="col-md-8">
                <p class="mb-2"><strong>Formato esperado:</strong></p>
                <ul class="mb-2">
                    <li>nomgas (Nombre del gasto)</li>
                    <li>valor (Valor del gasto)</li>
                    <li>fecgas (Fecha del gasto)</li>
                </ul>
                <span class="optional-badge">
                    Ejemplo: Arriendo,5.000.000,2026-05-01
                </span>
            </div>
            <div class="col-md-4 text-end">
                <input type="hidden" id="nregas" name="nregas" value="<?php if ($dtOne) echo $dtOne[0]["nregas"]; ?>">
                <input type="hidden" name="ope" value="save">
                <button type="submit" class="btn btn-institutional shadow">
                    Cargar Datos
                </button>
            </div>
        </div>
    </form>

</div>


<div class="table-container mt-4">

    <h5 class="mb-3"><i class="bi bi-table"></i>Resultados</h5>
    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Gasto</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Config</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if ($datAll) {
                    foreach ($datAll as $dt) { ?>
                        <tr>
                            <td><?= $dt["nregas"]; ?></td>
                            <td><?= $dt["nomgas"]; ?></td>
                            <td><?= $dt["valor"]; ?></td>
                            <td><?= $dt["fecgas"]; ?></td>
                            <td>
                                <a href="index.php?pg=20&ope=edi&nregas=<?= $dt['nregas']; ?>">
                                    <i class="fa-regular fa-pen-to-square fa-2x"></i>
                                </a>
                                <a href="index.php?pg=20&ope=eli&nregas=<?= $dt['nregas']; ?>"
                                    onclick="return eliminar('<?= $dt['nomgas']; ?>')">
                                    <i class="fa-regular fa-trash-can fa-2x"></i>
                                </a>
                            </td>

                        </tr>
                    <?php }
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nombre Gasto</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Config</th>
                </tr>
            </tfoot>

        </table>
    </div>
</div>