<?php

    define( "_DEFAULT_LANG_", "es_ES" );
    define ("_DEFAULT_LOCALE_DIR_", "locale");

    require "i18n.php";



    switch($_GET['lang']){

        case "es_AR":
        case "es_CH":
        case "es_ES":
            $lang = "es_ES";
        break;

        case "en_EN":
        case "en_UK":
        case "en_US":
            $lang = "en_UK";
        break;

        case "fr_FR":
            $lang = "fr_FR";
        break;

        case "zh_CN":
            $lang = "zh_CN";
            break;

        default:
            $lang = _DEFAULT_LANG_;
        break;
    }

    //Creates an internationalization object
    $i18n = new i18n ( $lang );

    //Avoids Apache Cache (useful for )
    $i18n->avoidCache();


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
            float: right; color: #333;
        }

        a {text-decoration: none; color: #399;}
    </style>
</head>

<body>

    <aside>
        <a href = "?lang=es_ES">es_ES</a> |
        <a href = "?lang=en_UK">en_UK</a> |
        <a href = "?lang=fr_FR">fr_FR</a> |
        <a href = "?lang=zh_CN">中文</a>
    </aside>

    <h1>PHP / i18n</h1>


    <div>
        <?php printf($i18n->_("Hello, world")); ?>
    </div>
    <div>
        <?php printf(ngettext("%s duck", "%s ducks", 0), 0); ?>

    </div>

    <h1>Object debug</h1>

    <?php var_dump($i18n); ?>



</body>
</html>

