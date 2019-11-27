<?php

/*
 * This file is part of the ColorJet package.
 *
 * (c) Arjuna Coding <arjuna@mischiefcollective.com>
 *
 */

namespace ArjunaCoding\ColorJet;

/**
 * Autoloader is used to autoload the library files
 *
 *
 * @author Arjuna Coding <arjuna@mischiefcollective.com>
 */
class Autoloader
{

    public static function register()
    {
        spl_autoload_register(array(new self, 'autoload'));
    }

    public static function autoload($class)
    {
        if (0 !== strpos($class, 'ArjunaCoding\\ColorJet')) {
            return;
        }

        if (is_file(
            $file = dirname(__FILE__) . '/../../' . str_replace(array('\\', "\0"), array('/', ''), $class) . '.php'
        )
        ) {
            require $file;
        }
    }
}
