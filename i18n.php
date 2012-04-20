<?php
/*
Class Name: Internacionalization for PHP
Description:  Manage multilingual texts in PHP
Version: 0.1
Author: Gotardo González
Author URI: http://blog.gotardo.es
*/

/* Copyright 2012 Gotardo González (email: contacto@gotardo.es)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

    class i18n {

        /**
         * Default language
         *
         * @var string
         */

        private $default_lang;

        /**
         * Default text domain
         *
         * @var string
         */

        private $default_textdomain;

        /**
         * All the domains to be used
         *
         * @var string
         */

        private $domains;

        public function __construct(){
            $this->domains = array();
        }


        //Init the i18n system
        public function init ($idioma, $default_textdomain) {
            $this->default_lang         = $idioma;
            $this->default_textdomain   = $default_textdomain;

            //Defines LC_ALL
            putenv("LC_ALL=" . $idioma);
            //Sets locale information
            setlocale(LC_ALL, $idioma);

            //Binds the default text domain
            bindtextdomain($this->default_textdomain, "./locale/");

            //Sets the default text domain
            textdomain($this->default_textdomain);

            return $this;
        }


        //Adds a text domain
        public function addtextdomain($domain, $directory){
            bindtextdomain($domain, $directory);
            return $this;
        }


        //Searchs and returns the translation for the given text and domain
        public function _($label, $domain = null){
            $trad = _($label);
            return $trad;

        }

    }


?>

