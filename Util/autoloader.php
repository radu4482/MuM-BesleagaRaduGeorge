<?php
function __autoload($class)
{
    if(file_exists(DIRECTOR_SITE . SLASH . 'Util' . SLASH . strtolower($class) . '.php'))
{
    require_once DIRECTOR_SITE . SLASH . 'Util' . SLASH . strtolower($class) . '.php';
}
else if(file_exists(DIRECTOR_SITE . SLASH . 'Model' . SLASH . strtolower($class) . '.php'))
{
    require_once DIRECTOR_SITE . SLASH . 'Model' . SLASH . strtolower($class) . '.php';
}
else if(file_exists(DIRECTOR_SITE . SLASH . 'Controllers' . SLASH . strtolower($class) . '.php'))
{
    require_once DIRECTOR_SITE . SLASH . 'Controllers' . SLASH . strtolower($class) . '.php';
}
else if(file_exists(DIRECTOR_SITE . SLASH . 'Views' . SLASH . strtolower($class) . '.php'))
{
    require_once DIRECTOR_SITE . SLASH . 'Views' . SLASH . strtolower($class) . '.php';
}
}
?>

//BESLEAGA RADU