<?php

    require "i18n.php";

    define( "_DEFAULT_LANG_", "es_ES" );

    //Sets the language
    if ( isset ( $_GET['lang'] ) )
        $lang = $_GET['lang'];
    else
        $lang = _DEFAULT_LANG_;

    //Creates an internationalization object
    $i18n = new i18n ( $lang );


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
        <a href = "?lang=es_ES">es_ES</a> |
        <a href = "?lang=en_UK">en_UK</a> |
        <a href = "?lang=fr_FR">fr_FR</a> |
        <a href = "?lang=zh_CN">中文</a>  |

        <a href = "?lang=en">en</a> |
        <a href = "?lang=es">es</a>
    </aside>

    <h1>PHP / i18n</h1>



    <?php printf($i18n->_("Hello, world")); ?>


</body>
</html>

