<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Person;

Route::get('people', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Person::all();
});

Route::get('people/{id}', function($id) {
    return Person::find($id);
});

Route::post('people', function(Request $request) {
    return Person::create($request->all());
});

Route::put('people/{id}', function(Request $request, $id) {
    $person = Person::findOrFail($id);
    $person->update($request->all());

    return $person;
});

Route::delete('people/{id}', function($id) {
    Person::find($id)->delete();

    return 204;
});
