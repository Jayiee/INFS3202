<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('verify(:any)', 'Register::verify/$1');

$routes->get('/', 'Home_page::index');

$routes->get('/login', 'Login::index');
$routes->post('/login/check_login', 'Login::check_login');
$routes->get('/login/logout', 'Login::logout');

$routes->get('/login/forget', 'Login::forget'); //这里填写用户名
$routes->post('/forget/check_user', 'Login::checkUser'); 
$routes->get('/forget/question', 'Forget::index'); //这里回答问题
$routes->post('/answer', 'Forget::forget'); 
$routes->get('/reset_password', 'Forget::reset_index'); //重设密码
$routes->post('/reset_login', 'Forget::reset'); 

$routes->get('/home_page', 'Home_page::index');
$routes->post('/search/suggest', 'Home_page::suggest');
$routes->post('/search', 'Home_page::search');
// $routes->get('/search', 'Search::index');

$routes->get('details/(:num)', 'Search::details/$1'); //搜索结果详情
$routes->post('details/add_wishlist','Search::addWishlist');

$routes->get('/register', 'Register::index');
$routes->post('/register/create_account', 'Register::register');


// $routes->get('/upload', 'Upload::index');
// $routes->post('/upload/upload_file', 'Upload::upload_file');
$routes->get('/profile_display', 'ProfileDisplay::index');

$routes->get('/profile', 'Profile::index');
$routes->post('/profile/update_profile', 'Profile::update_profile');

$routes->get('/upload_video', 'Upload_video::index');
$routes->post('/upload_video/video_frame', 'Upload_video::upload_video');

$routes->get('/upload_successfully', 'UploadSuccessfully::index');

$routes->get('/video_frame', 'Videoframe::index');
$routes->post('/video_frame/upload_video', 'Videoframe::upload_video');

$routes->get('/course_video', 'CourseVideo::index');
$routes->get('/course_video/get_comments', 'CourseVideo::get_comments');
$routes->post('/course_video/add_comment', 'CourseVideo::addComment');
$routes->post('/course_video/add_favourite', 'CourseVideo::addFavourite');

$routes->get('/course_video_2', 'CourseVideo2::index');
$routes->get('/course_video_2/get_comments', 'CourseVide2::get_comments');
$routes->post('/course_video_2/add_comment', 'CourseVideo2::addComment');
$routes->post('/course_video_2/add_favourite', 'CourseVideo2::addFavourite');

$routes->get('/course_video_3', 'CourseVideo3::index');
$routes->get('/course_video_3/get_comments', 'CourseVide3::get_comments');
$routes->post('/course_video_3/add_comment', 'CourseVideo3::addComment');
$routes->post('/course_video_3/add_favourite', 'CourseVideo3::addFavourite');

$routes->get('/favourite', 'Favourite::index');
$routes->get('/add_favourite', 'CourseVideo::index');

$routes->get('/pay_course', 'PayCourse::index');

$routes->get('/messages', 'SMS::index');
$routes->post('/messages/sendSMS','SMS::sendSMS');


$routes->get('/course', 'Course::index');

$routes->get('/wishlist', 'Wishlist::index');
$routes->post('/wishlist/delete_wishlist','Wishlist::delete');


$routes->get('imagesupport','Image::index');

$routes->post('/reply_sms','Twilio::index');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
