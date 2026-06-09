<?php
require_once("views/vmatlxc.php");
?>

<!-- CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<div class="container mt-4">

    <!-- CARD PRINCIPAL -->
    <div class="card card-form">

        <div class="card-body p-4">

            <!-- TITULO -->
            <h1 class="display-title">
                Listado Por Curso
            </h1>

            <p class="text-muted">
                Consulta y visualización de estudiantes registrados por curso
            </p>

            <hr>

            <!-- FORMULARIO -->
            <form method="POST" class="row g-3 mb-4">

                <div class="col-md-4">

                    <label class="form-label fw-bold" style="color:#1a3a52;">
                        Buscar Curso
                    </label>

                    <input 
                        type="text" 
                        name="curso" 
                        class="form-control"
                        placeholder="Ejemplo: 11-01"
                        required
                    >

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button 
                        type="submit" 
                        name="buscar"
                        class="btn btn-institutional w-100"
                    >
                        Buscar
                    </button>

                </div>

            </form>

            <!-- CURSO ACTUAL -->
            <?php
            if(isset($_POST['buscar'])){
            ?>

                <div class="alert alert-info">

                    <strong>Curso Actual:</strong> 
                    <?php echo $_POST['curso']; ?>

                </div>

            <?php
            }
            ?>

            <!-- TABLA -->
            <div class="table-container">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover align-middle">

                        <thead class="text-center">

                            <tr>
                                <th>#</th>
                                <th>Nombre Completo</th>
                                <th>Edad</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Documento</th>
                                <th>Sexo</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php

                        if(!empty($datos)){

                            $contador = 1;

                            while($fila = $datos->fetch_assoc()){

                        ?>

                            <tr>

                                <td class="text-center">
                                    <?php echo $contador++; ?>
                                </td>

                                <td>
                                    <?php echo $fila['nombre_completo']; ?>
                                </td>

                                <td class="text-center">
                                    <?php echo $fila['edad']; ?>
                                </td>

                                <td class="text-center">
                                    <?php echo $fila['fecha_nacimiento']; ?>
                                </td>

                                <td class="text-center">
                                    <?php echo $fila['documento']; ?>
                                </td>

                                <td class="text-center">
                                    <?php echo $fila['sexo']; ?>
                                </td>

                            </tr>

                        <?php
                            }

                        }else{
                        ?>

                            <tr>

                                <td colspan="6" class="text-center text-muted">

                                    No hay estudiantes registrados

                                </td>

                            </tr>

                        <?php
                        }
                        ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>