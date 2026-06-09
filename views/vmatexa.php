<?php
require_once("controllers/cmatexa.php");
?>

    <div class="card card-form p-4">
        

        <form method="POST" action="">

            <div class="row">

              <div class="col-md-6 mb-3">

    <h5 class="mb-3">Datos del Estudiante</h5>

    <label for="idest">
        ID del Estudiante
        <span class="required-mark">*</span>
    </label>

    <input
        type="number"
        name="idest"
        id="idest"
        class="form-control"
        value="<?php if(isset($datOn)) echo $datOn[0]['idest']; ?>"
        required
    >

    </div>

    <div class="col-md-6 mb-3">

    <h5 class="mb-3">Datos del Acudiente</h5>

    <label for="idacu">
        ID del Acudiente
        <span class="required-mark">*</span>
    </label>

    <input
        type="number"
        name="idacu"
        id="idacu"
        class="form-control"
        value="<?php if(isset($datOn)) echo $datOn[0]['idacu']; ?>"
        required
    >

    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <label>
                        Parentesco
                        <span class="required-mark">*</span>
                    </label>

                    <select
                        name="parentesco"
                        class="form-control"
                        required
                    >

                        <option value="">Seleccione...</option>

                        <option value="Padre" <?=isset($parexa) && $parexa=="Padre" ? "selected" : ""; ?>>
                            Padre
                        </option>

                        <option value="Madre" <?=isset($parexa) && $parexa=="Madre" ? "selected" : ""; ?>>
                            Madre
                        </option>

                        <option value="Tutor" <?=isset($parexa) && $parexa=="Tutor" ? "selected" : ""; ?>>
                            Tutor
                        </option>

                        <option value="Abuelo" <?=isset($parexa) && $parexa=="Abuelo" ? "selected" : ""; ?>>
                            Abuelo
                        </option>

                        <option value="Otro" <?=isset($parexa) && $parexa=="Otro" ? "selected" : ""; ?>>
                            Otro parentesco
                        </option>

                    </select>

                </div>

            </div>

            <div class="text-end mt-3">

                <button
                    type="submit"
                    class="btn btn-institutional">
                    Guardar Relación
                </button>

                <button
                    type="submit"
                    class="btn btn-institutional">
                    Limpiar
                </button>

            </div>

        </form>

    </div>

    <div class="table-container mt-4">

        <h5 class="mb-3">
            <i class="bi bi-people-fill"></i>
            Relaciones Registradas
        </h5>

        <div class="table-responsive">

            <table id="#myTable" 
            class="table table-striped table-hover">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>ID Estudiante</th>
                        <th>Nombre Estudiante</th>
                        <th>ID Acudiente</th>
                        <th>Nombre Acudiente</th>
                        <th>Parentesco</th>
                    </tr>

                </thead>

                <tbody>

                <?php

                $i = 5;

                if(!empty($datAll)){

                    foreach($datAll as $dt){

                ?>

                    <tr>

                        <td><?=$i++;?></td>

                        <td><?=$dt["idest"];?></td>

                        <td>
                            <?=isset($dt["nomest"]) ? $dt["nomest"] : "Sin nombre";?>
                        </td>

                        <td><?=$dt["idacu"];?></td>

                        <td>
                            <?=isset($dt["nomacu"]) ? $dt["nomacu"] : "Sin nombre";?>
                        </td>

                        <td><?=$dt["parexa"];?></td>

                    

                    </tr>
                <a href="index.php?pg=24&ope=edi&idper=<?=$dt['idper'];?>">
                <i class="fa-regular fa-pen-to-square fa-2x"></i>
                </a>

                <a href="index.php?pg=24&ope=eli&idper=<?=$dt['idper'];?>"
                onclick="return eliminar('<?=$dt['nomper'].' '.$dt['papeper'].' '.$dt['sapeper'];?>');">
                <i class="fa-regular fa-trash-can fa-2x"></i>
</a>
</a>

                <?php

                    }

                }else{

                ?>

                    <tr>
                        <td colspan="6" class="text-center">
                            No existen relaciones registradas
                        </td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>