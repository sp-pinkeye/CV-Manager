<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth ;
use Gate ;
use Session ;

class UsersController extends Controller
{

	/**
	*	index
	*
	*	A list of all users should only be accessible by the ADMINISTRATOR 
	*/
	public function index(){
	 
	 	$users = User::orderBy('created_at', 'asc')->get();
	 
	 	return view('users.index', ['users' => $users]);    
	}
	
	/**
	*	create
	*	
	* this not needed as is done by the Auth
	*/
	
	public function create(){
		return view('users.create' ) ;
	}
	
	public function store( Request $request ){
		$this->validate($request, [
		     'firstname' => 'required|max:255',
		     'lastname' => 'required|max:255',
		     'name' => 'required|unique:users|max:255',
		     'password' => 'required|max:255',
		     'email' => 'email|unique:users',		
		]);
		
		$user = new User;
		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;
		$user->name = $request->name;
		$user->password = $request->password;
		$user->email = $request->email;
		if( $request->telephone !== ''){
			$user->telephone = $request->telephone ;
		}
		if( $request->mobile !== ''){
			$user->mobile = $request->mobile ;
		}
		$user->save();
		
      Session::flash('message', 'Successfully created user!');
            
      return redirect('users') ;
	}
	
	public function show( $id ){
		
		if (Gate::denies('show', $id )) {
      	Session::flash('message', 'Wrong user id contact Administrator!');
            
      	return redirect('home') ;
      }

        $user = User::find(Auth::user()->id);

        return view('users.show', ['user'=>$user] );
	}
	
	public function edit( $id ){

		if (Gate::denies('edit', $id )) {
			
      	Session::flash('message', 'Wrong user id contact Administrator!');
            
      	return redirect('home') ;
      }
 
 			// test user id = auth id
        $user = User::find(Auth::user()->id);

        // show the view and pass the nerd to it
        return view('users.edit', ['user'=>$user] );
		
	}
	
	public function update( Request $request, $id ){

		if (Gate::denies('update', $id )) {

      	Session::flash('message', 'Wrong user id contact Administrator!');
            
      	return redirect('home') ;
      }
      
		$user = User::find($id);
		$this->validate($request, [
		     'firstname' => 'required|max:255',
		     'lastname' => 'required|max:255',
		     'name' => 'required|max:255',
		     'email' => 'email',		
		]);

		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;
		$user->name = $request->name;
		$user->email = $request->email;

		if( $request->telephone !== ''){
			$user->telephone = $request->telephone ;
		}
		if( $request->mobile !== ''){
			$user->mobile = $request->mobile ;
		}
		$user->save();
		
      Session::flash('message', 'Successfully Updated user!');
            
      return redirect('home') ;
	}
	public function destroy( $id ){
	}

}
