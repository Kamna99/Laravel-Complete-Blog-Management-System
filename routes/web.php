<?php

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

Route::get('/', 'FrontEndController@index')->name('home');
Route::get('/test',function(){
    return App\User::find(1)->profile;
});
Route::get('/post/{slug}','FrontEndController@singlePost')->name('post.single');
Route::get('/category/{id}','FrontEndController@category')->name('category.single');
Route::get('/tag/{id}','FrontEndController@tag')->name('tag.single');
Route::get('/results',function(){
   $posts=\App\Post::where('title','like','%'.request('query').'%')->get(); 
    return view('results')->with('posts',$posts)
                         ->with('title','Search Results:'.request('query'))
                        ->with('query',request('query'))
                        ->with('categories',\App\Category::take(5)->get())
                        ->with('settings',\App\Setting::first());
        
});

Auth::routes();



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::get('/post/create','PostsController@create')->name('post.create');
    Route::post('/post/store','PostsController@store')->name('post.store');
    Route::get('/category/create','CategoriesController@create')->name('category.create');
    Route::post('/category/store','CategoriesController@store')->name('category.store');
    Route::get('/categories','CategoriesController@index')->name('categories');
    Route::get('/category/edit/{id}','CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}','CategoriesController@update')->name('category.update');
    Route::get('/category/delete/{id}','CategoriesController@delete')->name('category.delete');
    Route::get('/posts','PostsController@index')->name('posts');
    Route::get('/post/edit/{id}','PostsController@edit')->name('post.edit');
    Route::get('/post/destroy/{id}','PostsController@destroy')->name('post.destroy');
    Route::post('/post/update/{id}','PostsController@update')->name('post.update');
    Route::get('/posts/trashed','PostsController@trashed')->name('post.trashed');
    Route::get('/posts/kill/{id}','PostsController@kill')->name('post.kill');
    Route::get('/posts/restore/{id}','PostsController@restore')->name('post.restore');
    Route::get('/tags','TagsController@index')->name('tags');
    Route::get('/tag/edit/{id}','TagsController@edit')->name('tag.edit');
    Route::get('/tag/destroy/{id}','TagsController@destroy')->name('tag.destroy');
    Route::post('/tag/update/{id}','TagsController@update')->name('tag.update');
    Route::post('/tag/store','TagsController@store')->name('tags.store');
    Route::get('/tag/create','TagsController@create')->name('tag.create');
    Route::get('/user/create','UsersController@create')->name('user.create');
    Route::post('/user/store','UsersController@store')->name('user.store');
    Route::get('/users','UsersController@index')->name('users');
    Route::get('user/admin/{id}','UsersController@admin')->name('user.admin')->middleware('admin');
    Route::get('user/not_admin/{id}','UsersController@not_admin')->name('user.not_admin');
    Route::get('user/profile','ProfilesController@index')->name('user.profile');
    Route::get('user/delete/{id}','UsersController@destroy')->name('user.delete');
    Route::post('user/profile/update','ProfilesController@update')->name('user.profile.update');
    Route::get('/settings','SettingsController@index')->name('settings')->middleware('admin');
    Route::post('/settings/update','SettingsController@update')->name('settings.update')->middleware('admin');
  
    
});
