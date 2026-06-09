<?php
require_once("controllers/ccofpag.php");
?>





<div class="card card-form p-4">
    <h5 class="mb-3"><i class="fa-solid fa-file-circle-plus me-2"></i> Nuevo Registro</h5>

    <form name="fmr1" method="POST" action="#" class="row">
        <div class="col-md-6">
            <label for="nompag" class="form-label fw-semibold">
                Nombre de Página<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="nompag" name="nompag" required value="<?php if($dtOn) echo $dtOn[0]['nompag'];?>">
        </div>


        <div class="col-md-6">
            <label for="arcpag" class="form-label fw-semibold">
                Archivo<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="arcpag" name="arcpag" required
                value="<?php if($dtOn) echo $dtOn[0]['arcpag'];?>">
        </div>


        <div class="col-md-6">
            <label for="mospag" class="form-label fw-semibold">
                Mostrar en Menú<span class="required-mark">*</span>
            </label>
            <select class="form-control" id="mospag" name="mospag">
                <option value="1"<?php if(isset($dtOn[0]['mospag']) && $dtOn[0]['mospag'] == 1)echo "selected";?>>Sí</option>
                <option value="0"<?php if(isset($dtOn[0]['mospag']) && $dtOn[0]['mospag'] == 0)echo "selected";?>>No</option>
            </select>
        </div>


        <div class="col-md-6">
            <label for="ordpag" class="form-label fw-semibold">
                Orden de Visualización<span class="required-mark">*</span>
            </label>
            <input type="number" class="form-control" id="ordpag" name="ordpag" required value="<?php if($dtOn) echo $dtOn[0]['ordpag'];?>">
        </div>


        <div class="col-md-6">
            <label for="icopag" class="form-label fw-semibold">
                Ícono<span class="required-mark">*</span>
            </label>
            <input type="text" class="form-control" id="icopag" name="icopag" required
                value="<?php if($dtOn) echo $dtOn[0]['icopag'];?>">
        </div>
        

        <div class="col-12 mt-4 text-end">
            <input type="hidden" name="idpag" id="idpag"
            value="<?php if($dtOn) echo $dtOn[0]['idpag']; ?>">
            <input type="hidden" name="ope" value="save">
            
            <button type ="submit"class="btn btn-institutional ">   
                <i class="bi bi-save me-2"></i>Registrar Página
            </button>
        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h5 class="mb-3"><i class="fa-solid fa-file-arrow-down"></i>Listado de Páginas Registradas</h5>

    
    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Archivo</th>
                    <th>Mostrar</th>
                    <th>Orden</th>
                    <th>Ícono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            
            <tbody>
                <?php if (isset($datAll) && $datAll) {
                    foreach ($datAll as $dt) { ?>
                        <tr>
                            <td><?= $dt["idpag"]; ?></td>
                            <td><?= $dt["nompag"]; ?></td>
                            <td><?= $dt["arcpag"]; ?></td>
                            <td><?= $dt["mospag"] == 1 ? "si" : "no"; ?></td>
                            <td><?= $dt["ordpag"]; ?></td>
                            <td>
                                <i class="<?= $dt["icopag"]; ?>"></i> 
                            </td>
                        <td>
                        <a href="index.php?pg=28&ope=edi&idpag=<?= $dt["idpag"]; ?>"><i class="fa-solid fa-file-signature fa-2x"></i></a>
                            
                        <a href="index.php?pg=28&ope=eli&idpag=<?= $dt["idpag"]; ?>" onclick="return eliminar('idpag');"><i class="fa-solid fa-file-excel fa-2x"></i></a>
                        </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">No hay páginas registradas.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>