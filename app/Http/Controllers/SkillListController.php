<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SkillList;

use Session;

class SkillListController extends Controller
{
	public function index(){
	 	 	$skill_list = SkillList::all();

	 	return view('skill_list.index', ['skill_list' => $skill_list]);    
	}
	
	public function create(){
		return view('skill_list.create' ) ;
	}
	
	public function store( Request $request ){
		$this->validate($request, [
		     'name' => 'required|max:255'
		]);
		$skill_list = new SkillList;
		$skill_list->name = $request->name;
		$skill_list->version = $request->version;
		$skill_list->experience = $request->experience;
		$skill_list->user_id = $request->user()->id;
		$skill_list->save();
		
      Session::flash('message', 'Successfully created Skill!');
            
      return redirect('skill_list') ;
	}
	
	public function show( $id ){
		 // get the nerd
        $skill_list = SkillList::find($id);

        // show the view and pass the nerd to it
        return view('skill_list.show', ['skill_list'=>$skill_list] );
	}
	
	public function edit( $id ){

        $skill_list = SkillList::find($id);

        // show the view and pass the nerd to it
        return view('skill_list.edit', ['skill_list'=>$skill_list] );
		
	}
	
	public function update( $id ){
		$this->validate($request, [
		     'name' => 'required|max:255'
		]);
		
		$skill_list = SkillList::find($id);

		$skill_list->name = $request->name;
		$skill_list->version = $request->version;
		$skill_list->experience = $request->experience;
		$skill_list->user_id = $request->user()->id;
		$skill_list->save();
		
      Session::flash('message', 'Successfully Updated skill_list!');
            
      return redirect('skill_list') ;
	}
	public function destroy( $id ){
	}

}
