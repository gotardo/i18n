<?php

    define( "_DEFAULT_LANG_", "es_ES" );
    define ("_DEFAULT_LOCALE_DIR_", "locale");

    require "i18n.php";



    switch($_GET['lang']){


        case "es":      $lang = "es_ES";    break;

        case "es_AR":   $lang = "es_ES";    break;
        case "es_CH":   $lang = "es_ES";    break;
        case "es_ES":   $lang = "es_ES";    break;


        case "en":      $lang = "en_GB";    break;

        case "en_AU":   $lang = "en_GB";    break;
        case "en_CA":   $lang = "en_GB";    break;
        case "en_GB":   $lang = "en_GB";    break;
        case "en_IE":   $lang = "en_GB";    break;
        case "en_IN":   $lang = "en_GB";    break;
        case "en_MT":   $lang = "en_GB";    break;
        case "en_NZ":   $lang = "en_GB";    break;
        case "en_PH":   $lang = "en_GB";    break;
        case "en_US":   $lang = "en_GB";    break;
        case "en_ZA":   $lang = "en_GB";    break;


        case "fr":      $lang = "fr_FR";    break;

        case "fr_FR":   $lang = "fr_FR";    break;


        case "zh":      $lang = "zh_CN";    break;

        case "zh_CN":   $lang = "zh_CN";    break;

        default:
            $lang = _DEFAULT_LANG_;
        break;
    }

    //Creates an internationalization object
    $i18n = new i18n ( $lang );

    //Avoids Apache Cache (useful for developers)
    //$i18n->avoidCache();


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
        <a href = "?lang=en_GB">en_GB</a> |
        <a href = "?lang=fr_FR">fr_FR</a> |
        <a href = "?lang=zh_CN">中文</a>
    </aside>

    <h1>PHP / i18n</h1>


    <div>
        <?php printf($i18n->_("Hello, world")); ?>
    </div>

</body>
</html>

