<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Asia/Manila');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(
    array(
	'base_url'      => '/oneraimol/',
        'index_file'    => FALSE,
        'errors'        => TRUE
    )
);

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
        //'user'          => MODPATH.'user',          // Useradmin module
//	'auth'          => MODPATH.'auth',          // Basic authentication
	'database'      => MODPATH.'database',      // Database access
	'image'         => MODPATH.'image',         // Image manipulation
	'orm'           => MODPATH.'orm',           // Object Relationship Mapping
//	'userguide'     => MODPATH.'userguide',     // User guide and API documentation
        'pagination'    => MODPATH.'pagination',    // Pagination
        //'oauth'         => MODPATH.'oauth',         // Kohana-Oauth for Twitter
//        'kohana-email'  => MODPATH.'kohana-email',  // Email
//        'swiftmailer'   => MODPATH.'swiftmailer',     // Swiftmailer
        'breadcrumbs'   => MODPATH.'breadcrumbs',      // Breadcrumbs
        'media'         => MODPATH.'media',         // Media compressor
//        'wkhtml'        => MODPATH.'wkhtml',
        'pdfview'       => MODPATH.'pdfview'        // PDF View
        //'jformer'       => MODPATH.'jformer'      // Breadcrumbs
        //'doctrine2'     => MODPATH.'doctrine2',     // Doctrine ORM
	// 'unittest'   => MODPATH.'unittest',      // Unit testing
	// 'cache'      => MODPATH.'cache',         // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',     // Benchmarking tool
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

// ROUTE FOR CMS SUBFOLDER
Route::set('cmssubfolders', '<directory>(/<controller>(/<action>(/<id>(/<id2>))))',
    array(
        'directory' => '(cms/accounts|cms/inventory|cms/sales|cms/signatories|cms/production|cms/reports|cms/systemsettings|cms/profile)'
    ))
    ->defaults(array(
        'controller' => 'index'
    ));

Route::set('cmssections', '<directory>(/<controller>(/<action>(/<id>(/<id2>))))',
    array(
        'directory' => 'cms'
    ))
    ->defaults(array(
        'controller' => 'dashboard',
        'action'     => 'index',
    ));

//ROUTE FOR ROOT CONTROLLERS
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'auth',
		'action'     => 'index',
	));

Route::set('error', 'error/<action>(/<message>)', 
        array(
            'action' => '[0-9]++', 
            'message' => '.+'))
        ->defaults(array(
            'controller' => 'error'
        ));
