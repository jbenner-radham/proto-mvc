<?php

namespace RadHam\Mvc;

class Controllers
{

    /**
     * [getList description]
     * @return [type] [description]
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public static function getList()
    {
        /**
         * Dynamically building all of our routes.
         */
        $routes_path = \RadHam\APP_PATH . '/routes';

        /**
         *
         */
        $controllers = []; //new \ArrayObject;

        if (!is_dir($routes_path)) {
            return false; // Bad stuff yo!
        }

        $dirs = new \DirectoryIterator($routes_path);

        foreach ($dirs as $dir) {

            // Skip over the "." and ".." path links.
            if ($dir->isDot()) {
                continue;
            }

            $route_controller = "{$routes_path}/" . $dir->getFilename() . '/Controller.php';

            if (is_file($route_controller) && is_readable($route_controller)) {
                //echo $dir->getFilename() . " <- It's a controller!<br><hr>";

                //$controllers->append($dir->getFilename());
                $controllers[] = $dir->getFilename();
            }

        }

        return $controllers;
    }
}
