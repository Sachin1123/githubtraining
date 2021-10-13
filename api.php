<?php
use app\Http\Controllers\API\ApitestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Passport\PersonalAccessClient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data', function() {
     return User::all();
});
Route::get('details/{id}', function($id) {
     return User::find($id);
});
Route::post('create', function(Request $request) {
    $datas = $request->all();
    $datas['password'] = Hash::make($datas['password']);
    $data=new User($datas);
    $data->save();
    return $data;
});
Route::put('update/{id}', function(Request $request, $id) {
   
    $datas = $request->all();
    $datas['password'] = Hash::make($datas['password']);
    $data = User::where('id', $id)->firstOrFail();
    $data->fill($datas);
    $data->save();
    return $data;
});
Route::delete('data/{id}', function($id) {
    User::find($id)->delete();
    return 204;
});
// Route::post('register', function (Request $request) {
//     $input = $request->all(); 
//     $input['password'] = Hash::make($input['password']); 
//     $user = User::create($input); 
//     $success['token'] =  $user->createToken('user')-> accessToken; 
//     $success['name'] =  $user->name;
// return response()->json(['success'=>$success], $this-> successStatus); 
// });
Route::get('users', [API\ApitestController::class,'index']);
Route::post('register', 'API\ApitestController@register');