<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIREMC - Gestión de Usuarios</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js" integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/valida.js"></script>

</head>
<body>
    <?php
        require_once('controllers/misfun.php');
        require_once('models/conexion.php');
        require_once('models/mcofpag.php');
        $pg = isset($_GET["pg"]) ? $_GET["pg"]:1;
        $mcofpag = new mCofpag();
        $mcofpag->setIdpag($pg);
        $dtpg = $mcofpag->getOne();
        $misfun = new misFun();
        include 'views/header.php';
    ?>

    <section>
        <section class="menu">
            <?php include 'views/vmen.php'; ?>
        </section>
        <section class="cont">
            <?php
                if($dtpg){
                    echo $misfun->titu($dtpg[0]['nompag'],$dtpg[0]['icopag']);
                }
            ?>
            <div id="error"></div>
            <?php


            // Datos personales
                if($pg==1) include 'views/vusudp.php'; //1.
            // M. Matriculas
                elseif($pg==2) include 'views/vmatest.php'; // 2. Estudiante
                elseif($pg==3) include 'views/vmatmat.php'; // 3. Matricula
                elseif($pg==4) include 'views/vmatexa.php'; // 4. Estudiante por Acudiente
                elseif($pg==5) include 'views/vmatrmat.php'; // 5. Reporte Matricula
            // M. Cursos
                elseif($pg==6 || !$pg) include 'views/vmatcur.php'; // 6. Curso
                elseif($pg==7) include 'views/vmatlxc.php'; // 7. Listado por curso
                elseif($pg==8) include 'views/vmatrlc.php'; // 8. Reporte Listados por curso
                elseif($pg==9) include 'views/vmatrac.php'; // 9. Reporte asistencia por curso
            // M. Cuentas
                elseif($pg==10) include 'views/vcueite.php'; //10. Item
                elseif($pg==11) include 'views/vcueivl.php'; //11. Item Valor
                elseif($pg==12) include 'views/vcuefac.php'; //12. Factura
                elseif($pg==13) include 'views/vcuedfa.php'; //13. Detalle de factura
                elseif($pg==14) include 'views/vcuelpg.php'; //14. Listado de Pagos
                elseif($pg==15) include 'views/vcuegsf.php'; //15. Gasto Fijo
                elseif($pg==16) include 'views/vcuedgf.php'; //16. Detalle Gasto
                elseif($pg==17) include 'views/vcuerfac.php'; //17. Reporte Factura
                elseif($pg==18) include 'views/vcuerixg.php'; //18. Reporte Ingresos vs Gastos
                elseif($pg==19) include 'views/vcuemite.php'; //19. Carga masiva de items
                elseif($pg==20) include 'views/vcuemgsf.php'; //20. Carga masiva de gastos
                elseif($pg==21) include 'views/vcuempgs.php'; //21. Carga masiva de pagos
                elseif($pg==22) include 'views/vcuecpgs.php'; //22. Carga de pago
            // M. Usuarios
                elseif($pg==23) include 'views/vusuacu.php'; //23. Acudiente
                elseif($pg==24) include 'views/vusuper.php'; //24. Empleado
                elseif($pg==25) include 'views/vusupef.php'; //25. Perfil
                elseif($pg==26) include 'views/vusuprf.php'; //26. Profesión
                elseif($pg==27) include 'views/vusucusu.php'; //27. Carga masiva de usuarios
            // M. Configuración
                elseif($pg==28) include 'views/vcofpag.php'; //28. Pagina
                elseif($pg==29) include 'views/vcofmod.php'; //29. Modulo
                elseif($pg==30) include 'views/vcofdom.php'; //30. Dominio
                elseif($pg==31) include 'views/vcofval.php'; //31. Valor
                elseif($pg==32) include 'views/vcofvig.php'; //32. Vigencia
                elseif($pg==33) include 'views/vcofubi.php'; //33. Ubicación
                elseif($pg==34) include 'views/vcofcof.php'; //34. Configuración software
            // M. Externo
                elseif($pg==35) include 'views/vini.php'; //35. Inicio Sesión
                elseif($pg==36) include 'views/volv.php'; //36. Olvido Contraseña
                elseif($pg==37) include 'views/vrcn.php'; //37. Recuperar Contraseña
            ?>
        </section>
    </section>
    <?php
        include 'views/footer.php';
    ?>

    <script src="js/code.js"></script>
</body>
</html>