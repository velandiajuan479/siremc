<?php require_once("controllers/cusuper.php"); ?>

<div class="card card-form p-4">
    <h5 class="mb-3"><i class="fa-solid fa-user-plus"></i> Actualizar datos</h5>
    <form method="POST" action="?pg=1&amp;idper=<?php echo $idActual; ?>" enctype="multipart/form-data" class="row">
    <!-- Foto -->
    <div class="col-md-3 mb-3 d-flex flex-column align-items-center">
        <label for="fotoInput" style="cursor:pointer;" title="Haz clic para cambiar la foto">
            <div id="fotoPreview" style="
                width: 140px; height: 170px; border-radius: 12px;
                background: #dde3ef; border: 2px solid #b0bcd4;
                display: flex; align-items: center; justify-content: center;
                overflow: hidden; flex-shrink: 0;
                transition: opacity .2s;">
                <?php if (!empty($e['fotoper'])): ?>
                    <img src="<?php echo htmlspecialchars($e['fotoper']); ?>"
                style="width:100%;height:100%;object-fit:cover;">
                <?php else: ?>
                    <i class="bi bi-person" style="font-size:3.5rem;color:#8899bb;"></i>
                <?php endif; ?>
            </div>
        </label>
        <input type="file" id="fotoInput" name="foto_file" accept="image/*" style="display:none">
        <input type="hidden" name="fotoper" id="fotoper_val" value="<?php echo htmlspecialchars($e['fotoper'] ?? ''); ?>">
        <input type="hidden" name="fotoper_original" value="<?php echo htmlspecialchars($e['fotoper'] ?? ''); ?>">
        <small class="text-muted mt-1">Clic para cambiar foto</small>
    </div>

    <!-- Campos principales -->
    <div class="col-md-9">
        <div class="row">
            <!-- Nombre y Apellidos (editables) -->
            <div class="col-md-4 mb-3">
                <label>Nombre(s) <span class="required-mark">*</span></label>
                <input type="text" name="nomper" class="form-control"
                value="<?php if($dtOn) echo $dtOn[0]['nomper']; ?>"
                placeholder="Ej: Juan Carlos" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Primer Apellido <span class="required-mark">*</span></label>
                <input type="text" name="papeper" class="form-control"
                value="<?php if($dtOn) echo $dtOn[0]['papeper']; ?>"
                placeholder="Ej: García" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Segundo Apellido</label>
                <input type="text" name="sapeper" class="form-control"
                value="<?php if($dtOn) echo $dtOn[0]['sapeper']; ?>"
                placeholder="Ej: López">
            </div>

            <!-- Tipo de Documento -->
            <div class="col-md-6 mb-3">
                <label>Tipo de Documento <span class="required-mark">*</span></label>
                <select name="tipdper" class="form-control form-select">
                    <?php if($datTdc){ foreach($datTdc AS $dt){ ?>
                    <option value="<?=$dt['idval'];?>" <?php if($dtOn && $dt['idval']==$dtOn[0]['tipdper']) echo 'selected'; ?>><?=$dt['nomval'];?></option>
                    <?php }} ?>
                </select>
            </div>

            <!-- No. Documento -->
            <div class="col-md-6 mb-3">
                <label>No. Documento <span class="required-mark">*</span></label>
                <input type="text" name="nuiper" class="form-control" value="<?php echo htmlspecialchars($e['nuiper'] ?? ''); ?>" placeholder="C.C. / T.I." required>
            </div>

            <!-- RH -->
            <div class="col-md-6 mb-3">
                <label>RH <span class="required-mark">*</span></label>
                <select name="rhper" class="form-control form-select">
                    <?php if($datRH){ foreach($datRH AS $dt){ ?>
                    <option value="<?=$dt['idval'];?>" <?php if($dtOn && $dt['idval']==$dtOn[0]['rhper']) echo 'selected'; ?>><?=$dt['nomval'];?></option>
                    <?php }} ?>
                </select>
            </div>

            <!-- Género -->
            <div class="col-md-6 mb-3">
                <label>Género <span class="required-mark">*</span></label>
                <select name="segper" class="form-control form-select">
                    <?php if($datGen){ foreach($datGen AS $dt){ ?>
                    <option value="<?=$dt['idval'];?>" <?php if($dtOn && $dt['idval']==$dtOn[0]['segper']) echo 'selected'; ?>><?=$dt['nomval'];?></option>
                    <?php }} ?>
                </select>
            </div>

            <!-- Email -->
            <div class="col-md-12 mb-3">
                <label>Email</label>
                <input type="email" name="emaper" class="form-control" value="<?php echo htmlspecialchars($e['emaper'] ?? ''); ?>" placeholder="correo@ejemplo.com">
            </div>
            <!-- Teléfono / Celular -->
            <div class="col-md-6 mb-3">
                <label>Teléfono</label>
                <input type="tel" name="telcper" class="form-control" value="<?php echo htmlspecialchars($e['telcper'] ?? ''); ?>" placeholder="Ej: 601 000 0000">
            </div>
            <div class="col-md-6 mb-3">
                <label>Contraseña</label>
                <input type="password" name="pasper" class="form-control" placeholder="Actualiza tu contraseña">
            </div>
            <!-- Dirección -->
            <div class="col-md-12 mb-3">
                <label>Dirección de Residencia</label>
                <input type="text" name="dircper" class="form-control" value="<?php echo htmlspecialchars($e['dircper'] ?? ''); ?>" placeholder="Calle 00 # 00 - 00">
            </div>
            <div class="text-end mt-3">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="idper" value="<?php echo $e['idper'] ?? '1'; ?>">
                <button type="submit" id="btnGuardar" class="btn btn-institutional">Actualizar</button>
            </div>
        </div>
    </div>
    </form>
</div>


<script>
/*
 // Foto: solo previsualización — el archivo real se envía por multipart al controller
 document.getElementById('fotoInput').addEventListener('change', function () {
  const file = this.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = function (ev) {
   document.getElementById('fotoPreview').innerHTML =
    '<img src="' + ev.target.result + '" style="width:100%;height:100%;object-fit:cover;">';
  };
  reader.readAsDataURL(file);
 });

 // Hover foto
 const fotoPreview = document.getElementById('fotoPreview');
 fotoPreview.addEventListener('mouseenter', () => fotoPreview.style.opacity = '0.8');
 fotoPreview.addEventListener('mouseleave', () => fotoPreview.style.opacity = '1');

 // Botón cambia a "Guardar Cambios" al detectar cualquier modificación
 const btnGuardar = document.getElementById('btnGuardar');
 const form = btnGuardar.closest('form');
 form.addEventListener('change', () => { btnGuardar.textContent = 'Guardar Cambios'; });
 form.addEventListener('input', () => { btnGuardar.textContent = 'Guardar Cambios'; });
 */
</script>