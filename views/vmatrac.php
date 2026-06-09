<?php
    require_once("controllers/cmatrac.php");
    require_once("controllers/cmatest.php");
?>

<?php if ($datOne): ?>
<div class="card card-form p-4 mb-4">
    <h4 class="mb-3 text-secondary">Editar Persona</h4>
    <form method="POST" action="index.php?pg=9&ope=upd">
        
        <input type="hidden" name="idper" value="<?= $datOne['idper'] ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Nombre</label>
                <input type="text" class="form-control" name="nomper" 
                       value="<?= $datOne['nomper'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Primer Apellido</label>
                <input type="text" class="form-control" name="papeper" 
                       value="<?= $datOne['papeper'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Segundo Apellido</label>
                <input type="text" class="form-control" name="sapeper" 
                       value="<?= $datOne['sapeper'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">No. Documento</label>
                <input type="text" class="form-control" name="nuiper" 
                       value="<?= $datOne['nuiper'] ?>">
            </div>
        </div>

        <div class="mt-4 text-end">
            <a href="index.php?pg=9" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-institutional">Guardar Cambios</button>
        </div>

    </form>
</div>
<?php endif; ?>

<div class="card card-form p-4 mb-5">
    
    <h4 class="mb-4 text-secondary">
        <i class="bi bi-clipboard-data me-2"></i>Reporte de Asistencia
    </h4>

    <form name="fmr1" method="POST" action="#" class="row">

        <div>
             <label for="idcur" class="form-label fw-semibold">
                Grado <span class="required-mark">*</span>
            </label>
            <select 
            class="form-select" 
            id="grado" 
            name="grado"
            onchange="this.form.submit()"
            >

            <option value="" disabled selected>
                Seleccione Grado...
            </option>

            <?php foreach($grados as $g){ ?>

                <option 
                    value="<?= $g['idcur']; ?>"

                    <?php
                        if(isset($_POST['grado']) && $_POST['grado'] == $g['idcur']){
                            echo "selected";
                        }
                    ?>
                >
                    <?= $g['nomcur']; ?>
                </option>

                <?php } ?>

            </select>
        </div>
        <div class="col-md-6">
            <label for="curso" class="form-label fw-semibold">
                Curso <span class="required-mark">*</span>
            </label>
            <select 
                class="form-select" 
                id="curso" 
                name="curso"
            >

                <option value="" disabled selected>
                    Seleccione un Curso...
                </option>

                <?php foreach($cursos as $c){ ?>

                    <option value="<?= $c['idcur']; ?>">
                        <?= $c['nomcur']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="col-md-6">
            <label for="fecini" class="form-label fw-semibold">
                Fecha de reporte <span class="required-mark">*</span>
            </label>
            <input 
                type="date" 
                class="form-control" 
                id="fecini" 
                name="fecini" 
                required
                placeholder="Seleccione la fecha inicial"
            >
        </div>
        <div class="col-md-6">
            <label class="form-label d-block fw-semibold">
                Estado de Asistencia <span class="required-mark">*</span>
            </label>

            <div class="form-check form-check-inline mt-2">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="estado" 
                    id="asistio" 
                    value="asistio" 
                    required
                >
                <label class="form-check-label" for="asistio">Asistió</label>
            </div>

            <div class="form-check form-check-inline">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="estado" 
                    id="inasistencia" 
                    value="inasistencia"
                >
                <label class="form-check-label" for="inasistencia">Inasistencia</label>
            </div>

            <div class="form-check form-check-inline">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="estado" 
                    id="todos" 
                    value="todos"
                >
                <label class="form-check-label" for="todos">Todos</label>
            </div>
        </div>

       
        <div class="col-12 mt-4 text-end">
            <input type="hidden" name="ope" value="save">
            <button type="submit" class="btn btn-institutional shadow">
                <i class="bi bi-file-earmark-bar-graph me-2"></i>Generar Reporte
            </button>
        </div>

    </form>
</div>

<div class="card card-form p-4 mt-4">

    <h4 class="mb-4 text-secondary">
        <i class="bi bi-table me-2"></i>
        Tabla de Asistencia
    </h4>

    <table class="table table-striped table-bordered text-center">
     <div class="table-responsive"></div>   
    <table id="myTable" class="table table-striped">
   <thead>

            <tr>
                <th>ID</th>
                <th>Curso</th>
                <th>No. Documento</th>
                <th>Acciones</th>

            </tr>

        <tbody id="tableBody">
            <?php if($datAll_cur){ foreach ($datAll_cur as $dt){ ?>
            <tr>
                <td><?=$dt["idcur"];?></td>
                <td><?=$dt["nomcur"];?> <?=$dt["depcur"];?></td>
                <td><?=$dt["idper"];?></td>
                <td>
                    <a href="index.php?pg=9&ope=edi&idper=<?= $dt['idper']; ?>">
                        <i class="fa-solid fa-list fa-2x"></i>
                    </a>
                    <a href="index.php?pg=9&ope=eli&idper=<?=$dt["idper"]; ?>" 
                        onclick=" return eliminar('<?= $dt['nomcur' ]; ?>')">
                        <i class="fa-regular fa-trash-can fa-2x"></i>
                    </a>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
        <tfoot>
    
        </tfoot>
        </table>
    </table>

</div>
