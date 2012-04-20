<?php

    require "i18n.php";

    //Sets the language
    if (isset($_GET['lang']))
        $lang = $_GET['lang'];
    else
        $lang = "es_ES";

    //Creates an internationalization object
    $i18n = new i18n();

    //Init the internationalization objetc
    $i18n
        ->init($lang, "hola")
        ->addtextdomain("hola", "/locale/");


?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>i18n en PHP</title>
    <style type="text/css">
        body{
            padding: 50px;
            font-family: "Lucida Grande";
        }

        aside {
            float: right;
        }
    </style>
</head>

<body>

    <aside>
        <a href = "?lang=es_ES">ES</a> |
        <a href = "?lang=en_UK">EN</a> |
        <a href = "?lang=fr_FR">FR</a> |
        <a href = "?lang=zh_CN">中文</a>
    </aside>

    <h1>PHP / i18n</h1>



    <?php printf("<p>%s</p>", $i18n->_("Hello, world")); ?>


    <h1>Debug</h1>

    <?php
        var_dump($i18n);


    ?>



</body>
</html>

