<?php

    /*
        Class Name: i18n for PHP
        Description:  Manage multilingual contents in PHP
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

        /**
         * just a constructor
         *
         *
         */

        public function __construct($language){

            $this->init($language);
        }


        /**
         * Inits the configuration
         *
         *  init(string $language, string $default_textdomain)
         */

        public function init ($language, $default_textdomain = "i18n") {

            //Inits the array for multiple domains
            $this->domains = array();

            //Defines LC_ALL
            putenv("LC_ALL=" . $language);

            //Sets locale information
            $this->default_lang         = setlocale(LC_ALL, $language);

            //Binds the default text domain
            bindtextdomain($default_textdomain, "./locale");
            $this->default_textdomain   = $default_textdomain;

            //Sets the default text domain
            textdomain($this->default_textdomain);

            return $this;
        }


        /**
         *
         *  adds a text domain
         *
         *  addtextdomain(string $domain, string $directory)
         */

        public function addtextdomain($domain, $directory){

            bindtextdomain($domain, $directory);
            return $this;

        }


        /**
         *
         *  translates a string
         *
         *  _(string $label)
         */

        public function _($label){

            $trans = _($label);
            return $trans;

        }

    }


?>

