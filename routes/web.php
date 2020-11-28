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

Route::get('/', function () {
    return view('welcome');
});

//// Login //////////////////
Route::get('/login', 'LoginController@fnLogin')->name('login');

Route::post('/check', 'LoginController@fnCheck')->name('check');

Route::get('/admin', 'LoginController@index')->name('admin');

Route::get('/logout', 'LoginController@fnLogout')->name('logout');
////////////// End login route ///////////////

////// START TYPE OF FOOD ROUTE //////
Route::get('/types', 'TypeController@index')->name('types');
/// route get food type to show
Route::get('/loadType', 'TypeController@fnloadType')->name('loadType');
// route insert food type
Route::post('/insertType', 'TypeController@fninsertType')->name('insertType');
// route get data to update food type form
Route::get('/getType/{tid}', 'TypeController@fngetType');
// route update food type
Route::post('/updateType/{tid}', 'TypeController@fnupdateType')->name('updateType');
// route delete food type
Route::get('/deleteType/{tid}', 'TypeController@fndeleteType');
//////////// END TYPE ROUTE ///////////////

//////////// START FOOD DATA //////////////
/// route food page
Route::get('/foods', 'FoodController@index')->name('foods');
// route show list food
Route::get('/foodlist', 'FoodController@fnloadFood');
// route add food page
Route::get('/addfood', 'FoodController@fnAddfood')->name('addfood');
// route to insert new food
Route::post('/insertfood', 'FoodController@fnInsertfood')->name('insertfood');
// route to update food image
Route::post('/editFoodimg', 'FoodController@fneditFoodimg')->name('editFoodimg');
// route to load food data to edit form
Route::post('/loadEditdata', 'FoodController@fnloadEditdata');
// Route to update food data
Route::post('/editFooddata', 'FoodController@fneditFooddata')->name('editFooddata');
// Route to delete food data
Route::post('/deleteFood', 'FoodController@fndeleteFood')->name('deleteFood');
///////////////////// END FOOD DATA //////////////////////

/////////////////// START TABLE DATA ////////////////////
//Route to show manage table page
Route::get('/tables', 'TableController@fnTablespage')->name('tables');
// route to load table data to show on table
Route::get('/loadTables', 'TableController@fnloadTables')->name('loadTables');
// route to insert new table
Route::post('/insertTale', 'TableController@fninsertTale')->name('insertTale');
// route to get data to edit form
Route::post('/getTableEdit', 'TableController@fngetTableEdit')->name('getTableEdit');
// route to update table data from edit form
Route::post('/updateTable', 'TableController@fnupdateTable')->name('updateTable');
// route to delete table data
Route::post('/deleteTable', 'TableController@fndeleteTable')->name('deleteTable');
/////////////////// END TABLE DATA //////////////////////