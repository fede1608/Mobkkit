<?php
// Developed by: solosequenosenada.com
// Version 1.0
// Your are free to use or modify this code. :)

// Si el idioma esta en la URL, grabarlo en una cookie 

if (isset($_GET["wlang"])) {
    $webLang = trim($_GET["wlang"]);
    $expire = time() + 60 * 60 * 24 * 30 * 12; // 6 meses
    setcookie("clang", $webLang, $expire);
} else {

    // Hay una cookie de idioma definida
    if (isset($_COOKIE["clang"])) {
        // leer idioma en la cookie
        $webLang = $_COOKIE["clang"];

        // No hay ninguna cookie de idioma definida
    } else {
        // detectar idioma del navegador
        $webLang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
        if (($webLang <> "es") AND ($webLang <> "pt")) {
            // Idioma por defecto, en caso de detectar un idioma raro que no tengamos
            $webLang = "en";
        }
        $expire = time() + 60 * 60 * 24 * 30 * 12; // 6 meses
        setcookie("clang", $webLang, $expire);
    }

    // Anti bucles infinitos (evita que si estamos en la página española, nos redirija a la página española y así una y otra vez sin parar.
    // redireccionar al idioma correspondiente
    switch ($webLang) {
        case "es":
            $folder = "es/";
            break;
        case "pt":
            $folder = "pt/";
            break;
        default:
            $folder = "en/";
    }
    include_once "language/" . $folder . "messages_lang.php";


}

function _translate($name)
{
    global $lang;
    if (isset($lang[$name])) return $lang[$name];
    return $name."NT";

}

?>