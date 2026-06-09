<?php
require_once ('models/mrcn.php');

 $idper = isset($_POST['idper']) ? $_POST['idper']:NULL;
  $nuiper = isset($_POST['nuiper']) ? $_POST['nuiper']:NULL;
  $nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
  $papeper = isset($_POST['papeper']) ? $_POST['papeper']:NULL;
  $sapeper = isset($_POST['sapeper']) ? $_POST['sapeper']: NULL;
  $fnacper = isset($_POST['fnacper']) ? $_POST['fnacper']: NULL;
  $ubinac = isset($_POST['ubinac']) ? $_POST['ubinac']:NULL;
  $rhper = isset($_POST['rhper']) ? $_POST['rhper']:NULL;
  $aleper = isset($_POST['aleper']) ? $_POST['aleper']:NULL;
  $fotoper = isset($_POST['fotoper']) ? $_POST['fotoper']:NULL;
  $dircper = isset($_POST['dircper']) ? $_POST['dircper']:NULL;
  $ubidirc = isset($_POST['ubidirc']) ? $_POST['ubidirc']:NULL;
  $telcper = isset($_POST['telcper']) ? $_POST['telcper']:NULL;
  $celcper = isset($_POST['celcper']) ? $_POST['celcper']:NULL;
  $dirtper = isset($_POST['dirtper']) ? $_POST['dirtper']:NULL;
  $ubidirt = isset($_POST['ubidirt']) ? $_POST['ubidirt']:NULL;
  $celtper = isset($_POST['celtper']) ? $_POST['celtper']:NULL;
  $emaper = isset($_POST['emaper']) ? $_POST['emaper']:NULL;
  $pasper = isset($_POST['pasper']) ? $_POST['pasper']:NULL;
  $pasper2 = isset($_POST['pasper2']) ? $_POST['pasper2'] : NULL; 
  $actper = isset($_POST['actper']) ? $_POST['actper']:NULL;
  $fsolper = isset($_POST['fsolper']) ? $_POST['fsolper']:NULL;
  $clvper = isset($_POST['clvper']) ? $_POST['clvper']:NULL;
  $ecmper = isset($_POST['ecmper']) ? $_POST['ecmper']:NULL;
  $segper = isset($_POST['segper']) ? $_POST['segper']:NULL;
  $idpro = isset($_POST['idpro']) ? $_POST['idpro']:NULL;

  $mrcn = new mRcn();
  $mensaje = '';


  if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($emaper) && !empty($pasper)) {

    if ($pasper !== $pasper2) {
        $mensaje = '<div class="alert alert-danger">Las contraseñas no coinciden.</div>';

    } elseif (strlen($pasper) < 8) {
        $mensaje = '<div class="alert alert-danger">La contraseña debe tener mínimo 8 caracteres.</div>';

    } else {
        $usuarioExiste = $mrcn->getByEmail($emaper);

        if (!$usuarioExiste) {
            $mensaje = '<div class="alert alert-danger">El correo no está registrado.</div>';
        } else {
            $mrcn->setemaper($emaper);
            $mrcn->setpasper($pasper);
            $resultado = $mrcn->updPassword();

            if ($resultado) {
                $mensaje = '<div class="alert alert-success">Contraseña actualizada correctamente.</div>';
            } else {
                $mensaje = '<div class="alert alert-danger">Error al actualizar la contraseña.</div>';
            }
        }
    }
}

$datAll = $mrcn->getAll();
?>