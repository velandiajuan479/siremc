<?php
    require_once("controllers/cusuprf.php");
?>

<div class="card card-form p-4">
    <h5 class="mb-3"><i class="fa-solid fa-user-plus me-2"></i> Nuevo Registro
    </h5>

    <form name="fmr1" method="POST" action="#" class="row">
        <div class="col-md-6">
            <label for="nompro" class="form-label fw-semibold">
                Profesión<span class="required-mark">*</span></label>
            <input type="text"
                   class="form-control"
                   id="nompro"
                   name="nompro"
                  
                   value="<?php if($dtOn) echo $dtOn[0]['nompro']; ?>">
        </div>

        <div class="col-12 mt-4 text-end">
            <input type="hidden" name="idpro" id="idpro"
                value="<?php if($dtOn) echo $dtOn[0]['idpro']; ?>">
            <input type="hidden" name="ope" value="save">

            <button type="submit" class="btn btn-institutional">
                <i class="bi bi-save me-2"></i>Registrar Profesión
            </button>
        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h5 class="mb-3">
        <i class="fa-solid fa-table"></i>Listado de Profesiones Registradas</h5>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            <?php if(isset($datALL) && $datALL){ 
                foreach($datALL as $dt){ ?>
                <tr>
                    <td><?= $dt["idpro"]; ?></td>
                    <td><?= $dt["nompro"]; ?></td>
                    <td>
                        <a href="index.php?pg=26&ope=edi&idpro=<?= $dt["idpro"]; ?>">
                            <i class="fa-solid fa-regular fa-pen-to-square fa-2x"></i>
                        </a>

                        <a href="index.php?pg=26&ope=eli&idpro=<?= $dt["idpro"]; ?>"
                        onclick="return eliminar('idpro');">
                            <i class="fa-solid fa-regular fa-trash-can fa-2x"></i>
                        </a>
                    </td>
                </tr>
            <?php }
            } ?>
            </tbody>

        </table>
    </div>
</div>