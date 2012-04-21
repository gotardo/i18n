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
         * If true, i18n runs a workaround to avoid the Apache Cache.
         * By default it's false
         *
         * @var string
         */

        private $avoidCache;

        /**
         * just a constructor
         *
         *
         */

        public function __construct($language){

            $this->default_lang = $language;
            $this->init($this->default_lang);
            $this->avoidCache = false;

        }


        /**
         * Inits the configuration
         *
         *  init(string $language, string $default_textdomain)
         */

        public function avoidCache($value = true){
            $this->avoidCache = $value;
            $this->init(
                $this->default_lang,
                $this->default_textdomain
            );
        }

        public function init ($language, $default_textdomain = "default") {


            /*
             * Cache workaround
             *
             */

            if ($this->avoidCache) {

                $mo_file =  _DEFAULT_LOCALE_DIR_ . "/" . $language . "/LC_MESSAGES/" . $default_textdomain . ".mo";

                // our new unique .MO file
                $mtime = filemtime($mo_file);
                $mo_file_new =  _DEFAULT_LOCALE_DIR_ . "/$language/LC_MESSAGES/{$default_textdomain}_{$mtime}.mo";

                if (!file_exists($mo_file_new)) {  // check if we have created it before
                    // if not, create it now, by copying the original
                    if (!copy($mo_file,$mo_file_new)) {
                        trigger_error("oh oh... couldn't uncache!", E_WARNING);
                    }


                }

                $default_textdomain =  "{$default_textdomain}_{$mtime}";

            }


            //Inits the array for multiple domains
            $this->domains = array();

            //Defines LC_ALL
            putenv("LC_ALL=" . $language);

            //Sets locale information
            $this->default_lang         = setlocale(LC_ALL, $language);
            setlocale(LC_MESSAGES, "");

            //Binds the default text domain
            bindtextdomain($default_textdomain, _DEFAULT_LOCALE_DIR_);
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

