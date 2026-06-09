<?php
require_once(__DIR__ . "/../controllers/ccuecpgs.php");

$control = new Ccuecpgs();

if($_POST){
    $control->savePagos($_POST);
}

$personas = $control->getPersonas();
?>



<div class="card card-form p-4">
    <form action="index.php?pg=22" method="POST">
        <div class="row">
            <div class="col-md-12 mb-3">
                <select name="idest" class="form-control" required>
    <option value="">Seleccione estudiante</option>
    <?php 
    // debes traer personas desde BD
    foreach($personas as $p){ ?>
        <option value="<?= $p["idper"] ?>">
            <?= $p["nomper"] ?>
        </option>
    <?php } ?>
</select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="monto_pago" class="form-label">Monto del Pago <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" id="monto_pago" name="monto_pago" class="form-control" step="0.01" min="0" placeholder="0.00" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="fecha_pago" class="form-label">¿Cuándo se realizó el pago? <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                    <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="novig" class="form-label">Número de Vigencia <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="number" id="novig" name="novig" class="form-control" placeholder="Ej. 20261000" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="act" class="form-label">Código de Actividad <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                    <input type="number" id="act" name="act" class="form-control" placeholder="Ingrese el código" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecini" class="form-label">Fecha Inicio Cobertura</label>
                <input type="date" id="fecini" name="fecini" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="fechfin" class="form-label">Fecha Fin Cobertura</label>
                <input type="date" id="fechfin" name="fechfin" class="form-control">
            </div>  

            <div class="col-md-12 mb-3">
                <label for="comprobante_pago" class="form-label">Subir Comprobante de Pago (Imagen o PDF)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-file-earmark-arrow-up"></i></span>
                    <input type="file" id="comprobante_pago" name="comprobante_pago" class="form-control" accept="image/*,.pdf">
                </div>
                <div class="form-text">Formatos permitidos: JPG, PNG, PDF. Tamaño máximo sugerido: 2MB.</div>
            </div>

            <div class="col-md-12 mt-3">
                <input type="hidden" name="idper" id="idper" value="<?php if ($dtOn) echo $dtOn[0]["idper"]; ?>"> 
                <input type="hidden" name="ope" value="save">
                <button type="submit" class="btn btn-primary">Registrar Pago</button>

            </div>

        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h5 class="mb-3">Listado de Personas</h5>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if($datos){ foreach ($datos as $dt) { ?>
                    <tr>
                        <td><?= $dt["nombre_estudiante"]; ?></td>
                        <td><?= $dt["monto_pago"]; ?></td>
                        <td><?= $dt["fecha_pago"]; ?></td>
                        <td><?= $dt["novig"]; ?></td>
                        <td><?= $dt["act"]; ?></td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
    
</div>