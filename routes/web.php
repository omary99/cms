<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route for home page
Route::get('/home', function () {
    return "This is the Home Page";
});

//Route for about page
Route::get('/about', function () {
    return "This is the About Page";
});

//Route for contact page
Route::get('/contact', function () {
    return "This is the Contact Page";
});

//Rout for post with id
Route::get('post/{id}', function($id){
    return "This is the post number ". $id;
});

//Route for the Post with the id and name
Route::get('post/{id}/{name}', function($id, $name){
    return "This is the post number ". $id. " and the name of the post is ". $name;
});


//Route by usimg array
Route::get('/admin/posts/example', array('as'=> 'admin.home', 
function(){
     $url = route('admin.home');
     return "Please use this url ". $url;
}));

Route::get('/customer/posts/day', array('as'=> 'customer.home', 
function(){
    $url = route('customer.home');
    return "This is the customer url, ". $url. " for the posts of the today.";
}
));

Route::get('/admin/{posts}/{date}', array('as'=>'admin.posts', 
function($posts, $date){
    $url = route('admin.posts');
    return "This is the url for admin posts". $url. " and the posts is ". $posts. " and date is ". $date;
}
));


///Routing controller
/**
 * There is the two ways of create routing controller. which is the old and new ways.
 * Old way: if you can use the old way you needed to register your route into the provider.
 *   example: Route::get('/posts', 'PostController@index') 
 *
 * New way: there is no need to register route into provider because it automatically loaded the application.
 * see the next example
 */

 Route::get('/post/{id}', [PostController::class, 'index']);

 // Resource Controllers
//  Route::resource('/postResource', 'PostController'); // Old way to create resource controller
// Route::resource('/postResource', PostController::class);

// Resource Controller Array
Route::resources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);

//Routes for post View
Route::get('/postPost', [PostController::class, 'postPost']);

//Routes for Photo view
Route::get('/postPhoto', [PhotoController::class, 'postPhoto']);
