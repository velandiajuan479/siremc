<?php
    require_once("controllers/ccueite.php");
?>

<main style="width:100%; padding:30px 20px; box-sizing:border-box; font-family: 'Segoe UI', Arial, sans-serif;">

  <section style="width:100%; max-width:1200px; margin:0 auto; background:white; padding:30px; border-radius:12px; box-shadow:0 3px 12px rgba(0,0,0,0.1);">

    <h2 style="margin-top:0; border-left:5px solid #2d6fa3; padding-left:12px; font-size:22px; color: #1f3f5b;">
      MÓDULO DE CARGA MASIVA DE USUARIOS
    </h2>

    <?php if (!empty($mensaje)): ?>
        <div style="padding: 15px; margin-bottom: 20px; border-radius: 8px; font-weight: bold;
                    background-color: <?= ($tipoMensaje === 'success') ? '#d4edda' : '#f8d7da'; ?>; 
                    color: <?= ($tipoMensaje === 'success') ? '#155724' : '#721c24'; ?>;
                    border: 1px solid <?= ($tipoMensaje === 'success') ? '#c3e6cb' : '#f5c6cb'; ?>;">
            <?= $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">

      <h3 style="color: #2d6fa3; border-bottom: 1px solid #eee; padding-bottom: 5px;">Datos del Estudiante</h3>

      <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:15px;">
        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Documento</label>
          <input type="text" name="doc_est" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>

        <div style="flex:2; min-width:300px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Nombre completo</label>
          <input type="text" name="nombre_est" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>
      </div>

      <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:20px;">
        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Fecha nacimiento</label>
          <input type="date" name="fecha_nac" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>

        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Género</label>
          <select name="genero" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box; background: #fff;">
            <option value="">Seleccione</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>
      </div>

      <h3 style="color: #2d6fa3; border-bottom: 1px solid #eee; padding-bottom: 5px;">Datos del Acudiente</h3>

      <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:15px;">
        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Documento</label>
          <input type="text" name="doc_acu" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>

        <div style="flex:2; min-width:300px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Nombre completo</label>
          <input type="text" name="nombre_acu" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>
      </div>

      <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:20px;">
        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Teléfono</label>
          <input type="tel" name="telefono" pattern="[0-9]{7,10}" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>

        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Correo</label>
          <input type="email" name="email" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>
      </div>

      <h3 style="color: #2d6fa3; border-bottom: 1px solid #eee; padding-bottom: 5px;">Datos de Matrícula</h3>

      <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:15px;">
        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Código</label>
          <input type="text" name="codigo_mat" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>

        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Grado</label>
          <select name="grado" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box; background: #fff;">
            <option value="">Seleccione</option>
            <option value="Primero">Primero</option>
            <option value="Segundo">Segundo</option>
            <option value="Tercero">Tercero</option>
            <option value="Cuarto">Cuarto</option>
            <option value="Quinto">Quinto</option>
            <option value="Sexto">Sexto</option>
            <option value="Séptimo">Séptimo</option>
            <option value="Octavo">Octavo</option>
            <option value="Noveno">Noveno</option>
            <option value="Décimo">Décimo</option>
            <option value="Undécimo">Undécimo</option>
          </select>
        </div>
      </div>

      <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:20px;">
        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Fecha matrícula</label>
          <input type="date" name="fecha_mat" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box;">
        </div>

        <div style="flex:1; min-width:250px;">
          <label style="display:block; margin-bottom:5px; font-weight:600;">Estado</label>
          <select name="estado" required
          style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; box-sizing: border-box; background: #fff;">
            <option value="">Seleccione</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        </div>
      </div>

      <h3 style="color: #2d6fa3; border-bottom: 1px solid #eee; padding-bottom: 5px;">Carga Masiva</h3>

      <div style="margin-bottom:25px; padding:15px; background:#f8f9fa; border: 2px dashed #2d6fa3; border-radius: 8px;">
        <label style="display:block; margin-bottom:8px; font-weight:bold;">Subir archivo estructurado (.CSV separado por punto y coma):</label>
        <input type="file" name="archivo" accept=".csv">
      </div>

      <div style="text-align:center; margin-bottom: 35px;">
        <button type="submit"
        style="background:#1f3f5b; color:white; padding:14px 40px; border:none; border-radius:30px; font-size:16px; cursor:pointer; font-weight:bold;">
          💾 GUARDAR REGISTROS
        </button>
      </div>

    </form>

    <div style="margin-top: 30px;">
        <h3 style="color: #1f3f5b; border-bottom: 2px solid #1f3f5b; padding-bottom: 8px;">Estudiantes Matriculados en el Sistema</h3>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 15px; text-align: left;">
                <thead>
                    <tr style="background-color: #2d6fa3; color: white;">
                        <th style="padding: 12px; border: 1px solid #ddd;">Documento</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Estudiante</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Código Matrícula</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Grado</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Fecha Registro</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($datAll)): ?>
                        <?php foreach ($datAll as $dt): ?>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 12px;"><?= htmlspecialchars($dt['nuiper']); ?></td>
                                <td style="padding: 12px;"><?= htmlspecialchars($dt['nomper']); ?></td>
                                <td style="padding: 12px;"><?= htmlspecialchars($dt['nomat']); ?></td>
                                <td style="padding: 12px;"><?= htmlspecialchars($dt['grado']); ?></td>
                                <td style="padding: 12px;"><?= htmlspecialchars($dt['fecmat']); ?></td>
                                <td style="padding: 12px;">
                                    <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;
                                                 background: <?= $dt['actmat'] ? '#d4edda' : '#f8d7da'; ?>; 
                                                 color: <?= $dt['actmat'] ? '#155724' : '#721c24'; ?>;">
                                        <?= $dt['actmat'] ? 'Activo' : 'Inactivo'; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="padding: 12px; text-align: center; color: #666;">No se encontraron registros de usuarios matriculados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

  </section>
</main>