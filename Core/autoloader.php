 <?php

function _autoloader($class_name)
{

	$autoloader_folders[] = '';

    $base_file_name = str_replace('_', '/', $class_name);

    foreach ($autoloader_folders as $folder)
    {
        $file_name = $folder . $base_file_name . '.php';
        if (file_exists($file_name))
        {
            include_once $file_name;
            return;
        }
    }
}

function register_autoloader()
{
    spl_autoload_register('_autoloader', true, true);
}

function unregister_autoloader()
{
    spl_autoload_unregister('_autoloader');
}

register_autoloader();