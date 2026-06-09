<?php
    require_once("controllers/cusuper.php");
?>

<div class="card card-form p-4">
    <h5 class="mb-3"><i class="fa-solid fa-user-plus"></i> Insertar Personas</h5>

    <form name="fmr1" method="POST" action="#" class="row">
        <div class="col-md-4 mb-3">
            <label for="tipdper">Tipo de Documento</label>
            <select name="tipdper" id="tipdper" class="form-control form-select">
            <?php if($datTdc){ foreach($datTdc AS $dt){ ?>
                <option value="<?=$dt['idval'];?>" <?php if($dtOn AND $dtOn[0]['tipdper']==$dt['idval']) echo "selected"; ?>><?=$dt['nomval'];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nuiper">No. Documento</label>
            <input type="number" name="nuiper" id="nuiper" class="form-control" required min="111111" max="99999999999" value="<?php if($dtOn) echo $dtOn[0]['nuiper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="rhper">RH</label>
            <select id="rhper" name="rhper" class="form-control form-select">
                <option value="0">Sin RH</option>
            <?php if($datRH){ foreach($datRH AS $dr){ ?>
                <option value="<?=$dr["idval"];?>" <?php if($dtOn AND $dtOn[0]['rhper']==$dr['idval']) echo "selected"; ?>><?=$dr["nomval"];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nomper">Nombres</label>
            <input type="text" name="nomper" id="nomper" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['nomper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="papeper">Primer Apellido</label>
            <input type="text" name="papeper" id="papeper" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['papeper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="sapeper">Segundo Apellido</label>
            <input type="text" name="sapeper" id="sapeper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['sapeper']; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="fnacper">Fecha de Nacimiento</label>
            <input type="date" name="fnacper" id="fnacper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['fnacper']; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="ubinac">Ciudad Nacimiento</label>
            <select id="ubinac" name="ubinac" class="form-control form-select">
            <?php if($datUbi){ foreach($datUbi AS $dr){ ?>
                <option value="<?=$dr["codubi"];?>" <?php if($dtOn AND $dtOn[0]['ubinac']==$dr['codubi']) echo "selected"; ?>><?=$dr["mn"];?> - <?=$dr["dp"];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="dircper">Dirección donde vive</label>
            <input type="text" name="dircper" id="dircper" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['dircper']; ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="ubidirc">Ciudad donde vive</label>
            <select id="ubidirc" name="ubidirc" class="form-control form-select">
            <?php if($datUbi){ foreach($datUbi AS $dr){ ?>
                <option value="<?=$dr["codubi"];?>" <?php if($dtOn AND $dtOn[0]['ubidirc']==$dr['codubi']) echo "selected"; ?>><?=$dr["mn"];?> - <?=$dr["dp"];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="telcper">No. Teléfono</label>
            <input type="number" name="telcper" id="telcper" class="form-control"  value="<?php if($dtOn) echo $dtOn[0]['telcper']; ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="celcper">No. Celular</label>
            <input type="number" name="celcper" id="celcper" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['celcper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="dirtper">Dirección Trabajo</label>
            <input type="text" name="dirtper" id="dirtper" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['dirtper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="ubidirt">Ciudad Trabajo</label>
            <select id="ubidirt" name="ubidirt" class="form-control form-select">
            <?php if($datUbi){ foreach($datUbi AS $dr){ ?>
                <option value="<?=$dr["codubi"];?>" <?php if($dtOn AND $dtOn[0]['ubidirt']==$dr['codubi']) echo "selected"; ?>><?=$dr["mn"];?> - <?=$dr["dp"];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="celtper">Teléfono trabajo</label>
            <input type="number" name="celtper" id="celtper" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['celtper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="emaper">E-mail</label>
            <input type="email" name="emaper" id="emaper" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['emaper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="pasper">Contraseña</label>
            <input type="password" name="pasper" id="pasper" class="form-control" value="">
        </div>
        <div class="col-md-4 mb-3">
            <label for="actper">Estado</label>
            <select id="actper" name="actper" class="form-control form-select">
            <?php if($datEst){ foreach($datEst AS $dr){ ?>
                <option value="<?=$dr["idval"];?>" <?php if($dtOn AND $dtOn[0]['actper']==$dr['idval']) echo "selected"; ?>><?=$dr["nomval"];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="idpro">Profesión</label>
            <input type="text" name="idpro" id="idpro" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['idpro']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="segper">EPS</label>
            <input type="text" name="segper" id="segper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['segper']; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="fotoper">Foto</label>
            <input type="file" name="fotoper" id="fotoper" class="form-control" value="">
        </div>
        <div class="col-md-12 mb-3">
            <label for="aleper">Alergías</label>
            <textarea name="aleper" id="aleper" class="form-control" placeholder="Por favor ingrese alergías que padezca, sino las tienen deje este campo en blanco"><?php if($dtOn) echo $dtOn[0]['aleper']; ?></textarea>
        </div>
        <div class="text-end mt-3">
            <input type="hidden" name="idper" id="idper" value="<?php if($dtOn) echo $dtOn[0]['idper']; ?>">
            <input type="hidden" name="ope" value="save">
            <button type="submit" class="btn btn-institutional">Guardar</button>
        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h5 class="mb-3"><i class="fa-solid fa-users"></i> Listado de Personas</h5>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if($datAll){ foreach ($datAll as $dt) { ?>
                <tr>
                    <td><?=$dt["nomper"]." ".$dt["papeper"]." ".$dt["sapeper"];?> RH: <?=$dt["rh"];?></td>
                    <td><?=$dt["tipo"];?> <?=$dt["nuiper"];?></td>
                    <td><?=$dt["emaper"];?></td>
                    <td><?=$dt["nuiper"];?></td>
                    <td>
                        <a href="index.php?pg=24&ope=edi&idper=<?=$dt['idper'];?>"><i class="fa-regular fa-pen-to-square fa-2x"></i></a>

                        <a href="index.php?pg=24&ope=eli&idper=<?=$dt['idper'];?>" onclick="return eliminar('<?=$dt["nomper"]." ".$dt["papeper"]." ".$dt["sapeper"];?>');"><i class="fa-regular fa-trash-can fa-2x"></i></a>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
