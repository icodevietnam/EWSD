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
Router::any('/admin/interactions', '\controllers\pages@interactionPage');
Router::any('/admin/project', '\controllers\pages@projectPage');
Router::any('/admin/forum', '\controllers\pages@forumPage');
Router::any('/admin/file', '\controllers\pages@filePage');
Router::any('/admin/assignation', '\controllers\pages@assignation');
Router::any('/home', '\controllers\pages@homePage');
Router::any('/login', '\controllers\pages@loginPage');
Router::any('/admin/dashboard', '\controllers\pages@dashBoardPage');
Router::any('/interactions', '\controllers\pages@interactions');
Router::any('/about', '\controllers\pages@about');
Router::any('/contact', '\controllers\pages@contact');
Router::any('/fees', '\controllers\pages@fees');
Router::any('/portfolio', '\controllers\pages@portfolio');
Router::any('/courses', '\controllers\pages@courses');
Router::any('/article', '\controllers\pages@article');

//define routes  
//Define Role
Router::get('/role/getAll', '\controllers\role@getAll');
Router::get('/role/getAllByRole', '\controllers\role@getAllByRole');
Router::get('/role/get', '\controllers\role@getById');
Router::post('/role/save', '\controllers\role@save');
Router::post('/role/edit', '\controllers\role@edit');
Router::post('/role/delete', '\controllers\role@delete');

//Define Course
Router::get('/course/getAll', '\controllers\course@getAll');
Router::get('/course/get', '\controllers\course@getById');
Router::post('/course/save', '\controllers\course@save');
Router::post('/course/edit', '\controllers\course@edit');
Router::post('/course/delete', '\controllers\course@delete');

//Define Account
Router::get('/account/getAll', '\controllers\user@getAll');
Router::get('/account/get', '\controllers\user@getById');
Router::post('/account/save', '\controllers\user@save');
Router::post('/account/edit', '\controllers\user@edit');
Router::post('/account/delete', '\controllers\user@delete');
//
Router::post('/loginStaffProcess','\controllers\user@loginStaff');
Router::post('/loginHomeProcess','\controllers\user@loginStaff');
Router::any('/logout','\controllers\user@logOut');
Router::get('/admin/project', '\controllers\project@index');

//Define Project
Router::get('/project/getAll', '\controllers\project@getAll');
Router::get('/project/get', '\controllers\project@getById');
Router::post('/project/save', '\controllers\project@save');
Router::post('/project/edit', '\controllers\project@edit');
Router::post('/project/delete', '\controllers\project@delete');
Router::get('/project/getProject','\controllers\project@getProjectIsNotManaged');

//Define Interaction
Router::get('/interaction/getAll', '\controllers\interaction@getAll');
Router::get('/interaction/get', '\controllers\interaction@getById');
Router::post('/interaction/save', '\controllers\interaction@save');
Router::post('/interaction/edit', '\controllers\interaction@edit');
Router::post('/interaction/delete', '\controllers\interaction@delete');

//Define Article
Router::get('/article/getAll', '\controllers\article@getAll');
Router::get('/article/get', '\controllers\article@getById');
Router::post('/article/save', '\controllers\article@save');
Router::post('/article/edit', '\controllers\article@edit');
Router::post('/article/delete', '\controllers\article@delete');
//Define Comment
Router::get('/comment/getAll', '\controllers\comment@getAll');
Router::get('/comment/get', '\controllers\comment@getById');
Router::post('/comment/save', '\controllers\comment@save');
Router::post('/comment/edit', '\controllers\comment@edit');
Router::post('/comment/delete', '\controllers\comment@delete');


//if no route found
Router::error('\core\error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
