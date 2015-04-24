<?php
if(file_exists('vendor/autoload.php')){
	require 'vendor/autoload.php';
} else {
	echo "<h1>Please install via composer.json</h1>";
	echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
	echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
	exit;
}

if (!is_readable('app/core/config.php')) {
	die('No config.php found, configure and rename config.example.php to config.php in app/core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}

//initiate config
new \core\config();

//create alias for Router
use \core\router,
    \helpers\url;


//load Page View
Router::any('/admin/role', '\controllers\pages@rolePage');
Router::any('/admin/course', '\controllers\pages@coursePage');
Router::any('/admin/article', '\controllers\pages@articlePage');
Router::any('/admin/account', '\controllers\pages@accountPage');  
Router::any('/admin/project', '\controllers\pages@projectPage');
Router::any('/admin/forum', '\controllers\pages@forumPage');
Router::any('/admin/file', '\controllers\pages@filePage');
Router::any('/home', '\controllers\pages@homePage');
Router::any('/login', '\controllers\pages@loginPage');
Router::any('/admin/dashboard', '\controllers\pages@dashBoardPage');
//define routes  
Router::any('/student/getAll', '\controllers\student@getAll');
Router::get('/role/getAll', '\controllers\role@getAll');
Router::post('/loginStaffProcess','\controllers\user@loginStaff');
Router::any('/logout','\controllers\user@logOut');
Router::get('/admin/project', '\controllers\project@index');
Router::get('/project/getAll', '\controllers\project@getAll');


//if no route found
Router::error('\core\error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
