<?php
 require_once("controllers/cmatrlc.php");
?>


<h1 class="display-title">Reporte Listado por Curso</h1>
    <p><strong>Curso Actual:</strong> 11-01</p>

    <hr>

    
    
    
<form method="POST">

    <label>Buscar curso:</label>

    <input type="text" name="curso" placeholder="Ingrese curso">

    <button type="submit" name="buscar">
        Buscar
    </button>

</form>
<div class="table-container mt-4">
    <h5 class="mb-3">Reposrte listado por curso</h5>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if($datAll){ foreach ($datAll as $dt) { ?>
                <tr>
                    <td><?=$dt["nomper"]." ".$dt["papeper"]." ".$dt["sapeper"];?></td>
                    <td><?=$dt["idper"];?></td>
                    <td><?=$dt["idcur"];?></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>