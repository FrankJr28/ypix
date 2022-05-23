<?php

require_once "modelos/conect.php";

require_once "modelos/crud.mdl.php";

require_once "controladores/crud.ctr.php";

require_once "controladores/plantilla.ctr.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrTraerPlantilla();
