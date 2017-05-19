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

Route::get('angular', function () {
	$data['data'] = DB::table('tasks')->get();
	$data['_token'] = [['id'=>csrf_token(),'name'=>'niel']]; // this is not yet done (data should be displayed on angular)
	return json_encode($data);
    //return view('angular');
});
Route::get('angular-insert', function () {
	echo '<form method="post" action="/angular-insert">';
	echo csrf_field();
	echo "<input name='name'>";
	echo '</form>';
});
Route::post('angular-insert', function () {
	DB::table('tasks')->insert(
		['name' => Request('name')]
	);

	return redirect('/angular');
});