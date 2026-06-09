
<?php 
require_once("controllers/ccofdom.php");
?>

<div class="card card-form p-4 mb-5">

    <h4 class="mb-4 text-secondary">
        <i class="bi bi-globe me-2"></i>Gestión de Dominios
    </h4>

    <form method="POST" id="dominioForm" class="row g-3 needs-validation" novalidate>

        <input type="hidden" name="accion" id="accion" value="guardar">

        <div class="col-md-6">
            <label for="iddom" class="form-label fw-semibold">
                ID Dominio <span class="text-danger">*</span>
            </label>
            <input
                type="number"
                class="form-control"
                id="iddom"
                name="iddom"
                placeholder="Ej: 1001"
                required>
        </div>

        <div class="col-md-6">
            <label for="nomdom" class="form-label fw-semibold">
                Nombre del Dominio <span class="text-danger">*</span>
            </label>
            <input
                type="text"
                class="form-control"
                id="nomdom"
                name="nomdom"
                placeholder="Ej: Tipo Documento"
                required>
        </div>

        <div class="col-md-6">
            <label for="nomper" class="form-label fw-semibold">
                Nombre y Apellido <span class="text-danger">*</span>
            </label>
            <input
                type="text"
                class="form-control"
                id="nomper"
                name="nomper"
                placeholder="Ej: Juan Pérez"
                required>
        </div>

        <div class="col-md-3">
            <label for="rhdom" class="form-label fw-semibold">
                RH <span class="text-danger">*</span>
            </label>
            <select class="form-select" id="rhdom" name="rhdom" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="estdom" class="form-label fw-semibold">
                Estado <span class="text-danger">*</span>
            </label>
            <select class="form-select" id="estdom" name="estdom" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>

        <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-primary me-2">
                <i class="bi bi-save"></i> Guardar
            </button>

            <button
                type="button"
                class="btn btn-secondary"
                onclick="limpiarFormulario()">
                <i class="bi bi-eraser"></i> Limpiar
            </button>
        </div>

    </form>

</div>

<div class="table-container mt-4">

    <h5 class="mb-3">Listado de Dominios</h5>

    <div class="table-responsive">

        <table class="table table-striped table-hover align-middle">

            <thead>
                <tr>
                    <th>ID Dominio</th>
                    <th>Nombre del Dominio</th>
                    <th>Nombre y Apellido</th>
                    <th>RH</th>
                    <th>Estado</th>
                    <th class="text-center" style="width: 150px;">Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php if($datAll){ foreach($datAll as $dt){ 

                    $valIddom  = isset($dt['iddom']) ? $dt['iddom'] : '';
                    $valNomdom = isset($dt['nomdom']) ? $dt['nomdom'] : '';
                    $valNomper = isset($dt['nomper']) ? $dt['nomper'] : '';
                    $valRhdom  = isset($dt['rhdom']) ? $dt['rhdom'] : '';
                    $valEstdom = isset($dt['estdom']) ? trim($dt['estdom']) : 'Inactivo';
                ?>

                    <tr>
                        <td><?= $valIddom; ?></td>
                        <td><?= $valNomdom; ?></td>
                        <td><?= $valNomper; ?></td>
                        <td><?= $valRhdom; ?></td>
                        <td>
                            <?php 
                            if (strtolower($valEstdom) === 'activo') {
                                echo '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1.5 rounded-pill">Activo</span>';
                            } else {
                                echo '<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1.5 rounded-pill">Inactivo</span>';
                            }
                            ?>
                        </td>

                        <td class="text-center">
                            <div class="d-inline-flex align-items-center justify-content-center bg-light border border-secondary-subtle rounded px-3 py-1 gap-3">
                                
                                <i
                                    class="bi bi-pencil-square text-dark-emphasis"
                                    style="cursor:pointer; font-size: 20px;"
                                    title="Editar"
                                    onclick="editarRegistro(
                                        '<?= addslashes($valIddom); ?>',
                                        '<?= addslashes($valNomdom); ?>',
                                        '<?= addslashes($valNomper); ?>',
                                        '<?= addslashes($valRhdom); ?>',
                                        '<?= addslashes($valEstdom); ?>'
                                    )">
                                </i>

                                <i
                                    class="bi bi-trash-fill text-danger"
                                    style="cursor:pointer; font-size: 20px;"
                                    title="Eliminar"
                                    onclick="eliminarRegistro(
                                        '<?= addslashes($valIddom); ?>'
                                    )">
                                </i>

                            </div>
                        </td>
                    </tr>

                <?php }} ?>

            </tbody>

        </table>

    </div>

</div>

<script>
{
function editarRegistro(iddom, nomdom, nomper, rhdom, estdom){

    document.getElementById("iddom").value = iddom;
    document.getElementById("nomdom").value = nomdom;
    document.getElementById("nomper").value = nomper;
    document.getElementById("rhdom").value = rhdom;
    document.getElementById("estdom").value = estdom;

    document.getElementById("accion").value = "editar";

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });

}

function eliminarRegistro(iddom){

    let confirmar = confirm(
        "¿Seguro que deseas eliminar este dominio?"
    );

    if(confirmar){
        window.location.href = "index.php?pg=30&del=" + iddom;
    }

}

}

function limpiarFormulario(){

    document.getElementById("iddom").value = "";
    document.getElementById("nomdom").value = "";
    document.getElementById("nomper").value = "";
    document.getElementById("rhdom").value = "";
    document.getElementById("estdom").value = "";

    document.getElementById("accion").value = "guardar";

}

</script>