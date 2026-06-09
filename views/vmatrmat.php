<?php
require_once("controllers/cmatrmat.php");
?>


<body>

  <div class="container">

    <h1>Reporte de Matrículas</h1>

    <div class="actions">
      <button class="btn btn-select" onclick="seleccionarTodo()">
        Seleccionar / Deseleccionar Todo
      </button>

      <button class="btn btn-download" onclick="descargarReporte()">
        Descargar Reporte Word
      </button>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Seleccionar</th>
            <th>Número de matrícula</th>
            <th>Número de vigencia</th>
            <th>Fecha de matrícula</th>
            <th>Folio de matrícula</th>
            <th>ID curso</th>
            <th>ID estudiante</th>
            <th>Precio de matrícula</th>
            <th>Estado de matrícula</th>
            <th>Institución educativa</th>
            <th>Nivel</th>
            <th>Grado</th>
            <th>Ubicación matrícula</th>
            <th>Actualización matrícula</th>
            <th>Fecha actualización</th>
          </tr>
        </thead>

        <tbody id="tablaMatriculas"></tbody>
      </table>
    </div>

  </div>
</body>
<?php
    
 ?>