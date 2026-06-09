<?php
require_once("controllers/ccofval.php");
?>

<div class="card card-form p-4">
    <h5 class="mb-4 text-secondary"><i class="bi bi-plus-circle me-2"></i>Nuevo Valor</h5>
    <form name="frmvlr" method="POST" action="#" class="row">
        <div class="col-md-4 mb-3">
            <label for="idval">Codigo</label>
            <input type="text" name="idval" id="idval" class="form-control"
                value="<?php if ($datOn)
                    echo $datOn[0]['idval']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="iddom">Dominio</label>
            <select name="iddom" id="iddom" class="form-control form-select">
                <?php if ($datDom) {
                    foreach ($datDom as $dt) { ?>
                        <option value="<?= $dt["iddom"]; ?>" <?php if ($datOn AND $datOn[0]["iddom"] == $dt["iddom"])
                              echo "selected"; ?>><?= $dt["nomdom"]; ?>
                        </option>
                    <?php }
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nomval">Nombre</label>
            <input type="text" name="nomval" id="nomval" class="form-control"
                value="<?php if ($datOn)
                    echo $datOn[0]['nomval']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="parval">Parametros</label>
            <input type="text" name="parval" id="parval" class="form-control"
                value="<?php if ($datOn)
                    echo $datOn[0]['parval']; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="actval">Estado</label>
            <select name="actval" id="actval" class="form-control form-select">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
        <div class="text-end mt-3">
            <input type="hidden" id="idval" name="idval" value="<?php if ($datOn)
                echo $datOn[0]["idval"]; ?>">
            <input type="hidden" name="ope" value="save">
            <button class="btn btn-institutional" name="ope" value="save">Guardar</button>
        </div>
    </form>
</div>

<div class="table-container mt-4">

    <h5 class="mb-3"><i class="bi bi-table me-2"></i>Listado de Valores</h4>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Dominio</th>
                        <th>Nombre</th>
                        <th>Parametros</th>
                        <th>Estado</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if ($datAll) {
                        foreach ($datAll as $dt) { ?>
                            <tr>
                                <td><?= $dt["idval"]; ?></td>
                                <td><?= $dt["nomdom"]; ?></td>
                                <td><?= $dt["nomval"]; ?></td>
                                <td><?= $dt["parval"]; ?></td>
                                <td><?= ($dt["actval"] == 1) ? "Activo" : "Inactivo"; ?></td>
                                <td>
                                    <a href="index.php?pg=31&ope=edi&idval=<?= $dt['idval']; ?>">
                                        <i class="fa-regular fa-pen-to-square fa-2x"></i></a>
                                    <a href="index.php?pg=31&ope=eli&idval=<?= $dt['idval']; ?>"
                                        onclick="return eliminar('<?= $dt['nomval']; ?>')">
                                        <i class="fa-regular fa-trash-can fa-2x"></i> </a>
                                </td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Codigo</th>
                        <th>Dominio</th>
                        <th>Nombre</th>
                        <th>Parametros</th>
                        <th>Estado</th>
                        <th>Valor</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>