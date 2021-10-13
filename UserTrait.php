<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserProfile;
use Auth;
use DB;
use Redirect;
trait UserTrait {

  public function index()
  {
     return view('home');
  }

  
    public function store(Request $request) {
      $validated = $request->validate([
        'email' => 'required',
        'name' => 'required',
        'password' => 'min:6',
        'password_confirmation' => 'required_with:password|same:password|min:6',
        'zip' => 'required',
       
    ]);
  
    $user=new User;
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password= Hash::make($request->password);
    $user->email_verified_at = now();
    $user->save();
    $data= new UserProfile;
    $data->country=$request->country;
    $data->state=$request->state;
    $data->city=$request->city;
    $data->zip=$request->zip;
    $data->user_id=$user->id;
    $data->save();

    return redirect()->route('manage')->withErrors(['msg' => 'Data Saved']);
}
public function add()
{
    $country=Country::get();
    $state=State::get();
    $city=City::get();
   return view('add_user',compact('country','state','city'));
}
public function manage()
{
  $data = User::with('userprofile')->where('email_verified_at','!=','NULL')->get();
    return view('manage',compact('data'));
}



public function delete($id){

 User::find($id)->delete();
 UserProfile::where('user_id',$id)->delete();
return Redirect::back()->withErrors(['msg' => 'Delete Successfully']);
}
}