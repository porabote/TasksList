<?php
namespace Core;

class Boostrap()
{
function start() {
    var_dump(ROOT);
    require_once 'core/model.php';
    require_once 'core/view.php';
    require_once 'core/controller.php';
    require_once 'core/route.php';
}
}
?>