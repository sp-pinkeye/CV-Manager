<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth ;
use Gate ;
use Session ;
use Policy ;

class UsersController extends Controller
{

 	/**
     * List of all users.
     *	NOTE : Only ADMIN user should acces this
     *
     * 
     * @return View of all users
     */	
	public function index(){
	 
	 	$users = User::orderBy('created_at', 'asc')->get();
	 
	 	return view('users.index', ['users' => $users]);    
	}
	
	/**
     * Create a user.
     *	NOTE : Not needed as Auth registers new user
     *
     * 
     * @return View of Create User Form
     */	
	
	public function create(){
		return view('users.create' ) ;
	}
	/**
     * Store a new user.
     *	NOTE : Not needed as Auth registers new user
     *
     * 
     * @return View of All users
     */	
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
	/**
     * Show a user.
     *
     * @param	$request - used to acces logged in user details 
     * @param 	$id	-	id of user details to show
     *
     *	NOTE : When Admin user defined the Policy will have to be changed.
     * 
     * @return View of Show User details
     */	
	public function show( Request $request ,$id ){
		
		$user = User::find($id);
      $policy = policy($user)->show($request->user(), $id) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }
        return view('users.show', ['user'=>$user] );
	}
	

	/**
     * Edit a user.
     *
     * @param	$request - used to access logged in user details 
     * @param 	$id	-	id of user details to edit
     *
     *	NOTE : When Admin user defined the Policy will have to be changed.
     * 
     * @return View of Edit User Form
     */	
	public function edit( Request $request ,$id ){
        
		// test user id = auth id
      $user = User::find($id);
      $policy = policy($user)->edit($request->user(), $id) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }
	
        // show the view and pass the nerd to it
        return view('users.edit', ['user'=>$user] );
		
	}
		/**
     * Update a user.
     *
     * @param	$request - used to access logged in user details 
     * @param 	$id	-	id of user details to save
     *
     *	NOTE : When Admin user defined the Policy will have to be changed.
     * 
     * @return View of Home Page
     */	

	public function update( Request $request, $id ){

		
		$user = User::find($id);
  	   $policy = policy($user)->update($request->user(), $id) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }
	
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
