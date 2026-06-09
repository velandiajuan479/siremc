<?php
require_once("controllers/cmatcur.php");
?>
<div class="card card-form p-4">
<?php
$dt_idcur = isset($datOne) && $datOne ? $datOne[0]['idcur'] : '';
$dt_nomcur = isset($datOne) && $datOne ? $datOne[0]['nomcur'] : '';
$dt_depcur = isset($datOne) && $datOne ? $datOne[0]['depcur'] : '';
$dt_idper = isset($datOne) && $datOne ? $datOne[0]['idper'] : '';
?>
  <form class="card-form p-4 mb-4" id="enrollment-form" method="POST" action="index.php?pg=6">
    <input type="hidden" name="ope" value="save">
    <div class="row g-3">
      <div class="col-md-4">
        <label for="student-name" class="form-label fw-semibold">ID Curso</label>
        <select class="form-select" id="student-name" name="idcur" required>
          <option value="">Seleccione un curso</option>
          <?php
          foreach ($datAll as $dat) {
            ?>
            <option value="<?= $dat['idcur'] ?>" <?= ($dt_idcur == $dat['idcur']) ? 'selected' : '' ?>><?= $dat['idcur'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="col-md-4">
        <label for="student-id" class="form-label fw-semibold">Nombre del Curso</label>
        <select class="form-select" id="student-id" name="nomcur" required>
          <option value="">Seleccione un curso</option>
          <?php
          foreach ($datAll as $dat) {
            ?>
            <option value="<?= $dat['nomcur'] ?>" <?= ($dt_nomcur == $dat['nomcur']) ? 'selected' : '' ?>><?= $dat['nomcur'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="col-md-4">
        <label for="course-select" class="form-label fw-semibold">Dependencia</label>
        <select class="form-select" id="course-select" name="depcur" required>
          <option value="">Seleccione una dependencia</option>
          <?php
          foreach ($datAll as $dat) {
            ?>
            <option value="<?= $dat['depcur'] ?>" <?= ($dt_depcur == $dat['depcur']) ? 'selected' : '' ?>><?= $dat['depcur'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="col-md-4">
        <label for="enrollment-date" class="form-label fw-semibold">ID Persona</label>
        <select class="form-select" id="enrollment-date" name="idper" required>
          <option value="">Seleccione una persona</option>
          <?php
          foreach ($datAll as $dat) {
            ?>
            <option value="<?= $dat['idper'] ?>" <?= ($dt_idper == $dat['idper']) ? 'selected' : '' ?>><?= $dat['idper'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>
    <div class="col-12 mt-4 text-end">
      <button type="submit" class="btn btn-institutional shadow">
        <i class="bi bi-save me-2"></i>Registrar Curso
      </button>
    </div>
  </form>
</div>

<div class=" table-container mt-4">
  <h5 class="mb-3">Listado de cursos</h5>

  <div class="table-responsive">
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th>ID Curso</th>
            <th>Nombre Curso</th>
            <th>Dependencia</th>
            <th>ID Persona</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <?php
          foreach ($datAll as $dat) { ?>
            <tr>
              <td><?= $dat['idcur'] ?></td>
              <td><?= $dat['nomcur'] ?></td>
              <td><?= $dat['depcur'] ?></td>
              <td><?= $dat['idper'] ?></td>
              <td>    
                  <a href="index.php?pg=6&ope=edi&idcur=<?=  $dat['idcur']; ?>" class="me-2">
                    <i class="fa-regular fa-pen-to-square fa-2x"></i>
                  </a>
                  <a href="#"
                  onclick="return eliminarFila('<?= $dat['nomcur']; ?>', this)">
                    <i class="fa-regular fa-trash-can fa-2x"></i>
                  </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>