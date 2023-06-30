<?php
/*TODO: Requerimientos */

require_once("../models/obras.model.php");
error_reporting(0);

$obra = new ObrasModel;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $obras->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $ID_Obra = $_POST["ID_Obra"];
        $datos = array();
        $datos = $obras->uno($ID_Obra);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $nombre = $_POST["nombre"];

        $datos = array();
        $datos = $obras->Insertar($ID_Obra, $nombre, $ID_Artista);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar Maria Eugenia Serrano*/
    case 'actualizar':
        $nombre = $_POST["nombre"];

        $datos = array();
        $datos = $obras->Actualizar($ID_Obra, $nombre,$ID_Artista);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $ID_Obra = $_POST["ID_Obra"];
        $datos = array();
        $datos = $cliente->Eliminar($ID_Obra);
        echo json_encode($datos);
        break;
}
