<?php
    require_once("controllers/cusuacu.php");
?>

<h1 class="display-title">Acudientes</h1>

<div class="card card-form p-4 mb-5">
    <h4 class="mb-4 text-secondary"><i class="bi bi-person-plus me-2"></i>Nuevo Registro</h4>
    <form id="registrationFormPer" class="row g-3 needs-validation" novalidate>

        <div class="col-12">
            <h6 class="text-uppercase text-muted border-bottom pb-1 mb-2">
                <i class="bi bi-card-text me-1"></i> Identificación
            </h6>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-semibold">Tipo de Documento <span class="required-mark">*</span></label>
            <select class="form-select" id="tipdper" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CE">Cédula de Extranjería</option>
                <option value="PA">Pasaporte</option>
                <option value="RC">Registro Civil</option>
                <option value="PEP">Permiso Especial de Permanencia</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold">No. de Identificación <span class="required-mark">*</span></label>
            <input type="text" class="form-control" id="nuiper" required placeholder="C.C. / T.I. / C.E.">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold">Nombre <span class="required-mark">*</span></label>
            <input type="text" class="form-control" id="nomper" required placeholder="Nombre">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold">Primer Apellido <span class="required-mark">*</span></label>
            <input type="text" class="form-control" id="papeper" required placeholder="Apellido 1">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold">Segundo Apellido <span class="optional-badge">(Opcional)</span></label>
            <input type="text" class="form-control" id="sapeper" placeholder="Apellido 2">
        </div>

        <div class="col-12 mt-2">
            <h6 class="text-uppercase text-muted border-bottom pb-1 mb-2">
                <i class="bi bi-person-vcard me-1"></i> Datos Personales
            </h6>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-semibold">Fecha de Nacimiento <span class="required-mark">*</span></label>
            <input type="date" class="form-control" id="fnacper" required>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold">Municipio de Nacimiento <span class="required-mark">*</span></label>
            <select class="form-select" id="ubinac" required>
                <option value="" selected disabled>Seleccione un municipio...</option>
                <option value="Bogotá">Bogotá D.C.</option>
                <option value="Medellín">Medellín</option>
                <option value="Cali">Cali</option>
                <option value="Barranquilla">Barranquilla</option>
                <option value="Cartagena">Cartagena</option>
                <option value="Bucaramanga">Bucaramanga</option>
                <option value="Cúcuta">Cúcuta</option>
                <option value="Pereira">Pereira</option>
                <option value="Manizales">Manizales</option>
                <option value="Santa Marta">Santa Marta</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold">RH / Grupo Sanguíneo <span class="required-mark">*</span></label>
            <select class="form-select" id="rhper" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="1">A+</option>
                <option value="2">A-</option>
                <option value="3">B+</option>
                <option value="4">B-</option>
                <option value="5">AB+</option>
                <option value="6">AB-</option>
                <option value="7">O+</option>
                <option value="8">O-</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold">Alergias <span class="optional-badge">(Opcional)</span></label>
            <input type="text" class="form-control" id="aleper" placeholder="Ej: Polen, Penicilina...">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Foto de Perfil <span class="optional-badge">(Opcional)</span></label>
            <input type="file" class="form-control" id="fotoper" accept="image/*">
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold">Estado Civil <span class="required-mark">*</span></label>
            <select class="form-select" id="ecmper" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="Soltero">Soltero(a)</option>
                <option value="Casado">Casado(a)</option>
                <option value="UnionLibre">Unión Libre</option>
                <option value="Divorciado">Divorciado(a)</option>
                <option value="Viudo">Viudo(a)</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold">Seguro <span class="optional-badge">(Opcional)</span></label>
            <select class="form-select" id="segper">
                <option value="" selected>Seleccione...</option>
                <option value="Nueva EPS">Nueva EPS</option>
                <option value="Sanitas">Sanitas</option>
                <option value="Sura">Sura</option>
                <option value="Compensar">Compensar</option>
                <option value="Famisanar">Famisanar</option>
                <option value="Coosalud">Coosalud</option>
                <option value="Salud Total">Salud Total</option>
                <option value="Capital Salud">Capital Salud</option>
            </select>
        </div>

        <div class="col-12 mt-2">
            <h6 class="text-uppercase text-muted border-bottom pb-1 mb-2">
                <i class="bi bi-house me-1"></i> Dirección de Casa
            </h6>
        </div>

        <div class="col-md-5">
            <label class="form-label fw-semibold">Dirección Casa <span class="required-mark">*</span></label>
            <input type="text" class="form-control" id="dircper" required placeholder="Calle 00 # 00 - 00">
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold">Ciudad de Residencia <span class="required-mark">*</span></label>
            <select class="form-select" id="ubidirc" required>
                <option value="" selected disabled>Seleccione un municipio...</option>
                <option value="Bogotá">Bogotá D.C.</option>
                <option value="Medellín">Medellín</option>
                <option value="Cali">Cali</option>
                <option value="Barranquilla">Barranquilla</option>
                <option value="Cartagena">Cartagena</option>
                <option value="Bucaramanga">Bucaramanga</option>
                <option value="Cúcuta">Cúcuta</option>
                <option value="Pereira">Pereira</option>
                <option value="Manizales">Manizales</option>
                <option value="Santa Marta">Santa Marta</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold">Teléfono Casa <span class="optional-badge">(Opcional)</span></label>
            <input type="tel" class="form-control" id="telcper" placeholder="601 000 0000">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold">Celular Casa <span class="optional-badge">(Opcional)</span></label>
            <input type="tel" class="form-control" id="celcper" placeholder="300 000 0000">
        </div>

        <div class="col-12 mt-2">
            <h6 class="text-uppercase text-muted border-bottom pb-1 mb-2">
                <i class="bi bi-briefcase me-1"></i> Dirección de Trabajo
            </h6>
        </div>

        <div class="col-md-5">
            <label class="form-label fw-semibold">Dirección Trabajo <span class="optional-badge">(Opcional)</span></label>
            <input type="text" class="form-control" id="dirtper" placeholder="Calle 00 # 00 - 00">
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold">Ciudad de Trabajo <span class="optional-badge">(Opcional)</span></label>
            <select class="form-select" id="ubidirt">
                <option value="" selected>Seleccione un municipio...</option>
                <option value="Bogotá">Bogotá D.C.</option>
                <option value="Medellín">Medellín</option>
                <option value="Cali">Cali</option>
                <option value="Barranquilla">Barranquilla</option>
                <option value="Cartagena">Cartagena</option>
                <option value="Bucaramanga">Bucaramanga</option>
                <option value="Cúcuta">Cúcuta</option>
                <option value="Pereira">Pereira</option>
                <option value="Manizales">Manizales</option>
                <option value="Santa Marta">Santa Marta</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold">Celular Trabajo <span class="optional-badge">(Opcional)</span></label>
            <input type="tel" class="form-control" id="celtper" placeholder="300 000 0000">
        </div>

        <div class="col-12 mt-2">
            <h6 class="text-uppercase text-muted border-bottom pb-1 mb-2">
                <i class="bi bi-shield-lock me-1"></i> Acceso al Sistema
            </h6>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Email <span class="required-mark">*</span></label>
            <input type="email" class="form-control" id="emaper" required placeholder="correo@ejemplo.com">
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold">Contraseña <span class="required-mark">*</span></label>
            <input type="password" class="form-control" id="pasper" required placeholder="••••••••">
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold">Clave / Token <span class="optional-badge">(Opcional)</span></label>
            <input type="text" class="form-control" id="clvper" placeholder="Token de acceso">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Profesión <span class="required-mark">*</span></label>
            <select class="form-select" id="idpro" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="Ingeniero">Ingeniero</option>
                <option value="Docente">Docente</option>
                <option value="Médico">Médico</option>
                <option value="Abogado">Abogado</option>
                <option value="Contador">Contador</option>
                <option value="Administrador">Administrador</option>
                <option value="Comerciante">Comerciante</option>
                <option value="Empleado">Empleado</option>
                <option value="Independiente">Trabajador Independiente</option>
                <option value="Estudiante">Estudiante</option>
                <option value="Ama de Casa">Ama de Casa</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold">Fecha de Solicitud <span class="optional-badge">(Opcional)</span></label>
            <input type="datetime-local" class="form-control" id="fsolper">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" role="switch" id="actper" checked>
                <label class="form-check-label fw-semibold" for="actper">Persona Activa</label>
            </div>
        </div>

        <div class="col-12 mt-4 text-end">
            <button type="submit" class="btn btn-institutional shadow">
                <i class="bi bi-save me-2"></i>Registrar Persona
            </button>
        </div>
    </form>
</div>
<div class="table-container shadow-sm">
    <h4 class="mb-4 text-secondary d-flex align-items-center">
        <i class="bi bi-table me-2"></i>Listado de Personas Registradas
    </h4>
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle" id="perTable">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Tipo Doc.</th>
                    <th>No. Identificación</th>
                    <th>F. Nacimiento</th>
                    <th>Municipio Nac.</th>
                    <th>RH</th>
                    <th>Email</th>
                    <th>Cel. Casa</th>
                    <th>Dir. Casa</th>
                    <th>Ciudad Res.</th>
                    <th>Dir. Trabajo</th>
                    <th>Ciudad Trab.</th>
                    <th>Cel. Trabajo</th>
                    <th>Profesión</th>
                    <th>Estado Civil</th>
                    <th>Seguro</th>
                    <th>F. Solicitud</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="perTableBody">
                <?php if($datAll){ foreach ($datAll as $dt) { ?>
                    <tr>
                        <td><?=$dt["nomper"]." ".$dt["papeper"]." ".$dt["sapeper"];?></td>
                        <td><?=$dt["tipdper"];?></td>
                        <td><?=$dt["nuiper"];?></td>
                        <td><?=$dt["fnacper"];?></td>
                        <td><?=$dt["ubinac"];?></td>
                        <td><?=$dt["rhper"];?></td>
                        <td><?=$dt["emaper"];?></td>
                        <td><?=$dt["celcper"];?></td>
                        <td><?=$dt["dircper"];?></td>
                        <td><?=$dt["ubidirc"];?></td>
                        <td><?=$dt["dirtper"];?></td>
                        <td><?=$dt["ubidirt"];?></td>
                        <td><?=$dt["celtper"];?></td>
                        <td><?=$dt["idpro"];?></td>
                        <td><?=$dt["ecmper"];?></td>
                        <td><?=$dt["segper"];?></td>
                        <td><?=$dt["fsolper"];?></td>
                        <td><?=($dt["actper"] ? 'Activo' : 'Inactivo');?></td>
                    </tr>
                        
                    <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
