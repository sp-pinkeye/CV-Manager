<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SkillList;

use Auth ;
use Session;

class SkillListController extends Controller
{
    /**
     * List all SkillList entries
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index(){
	 	 	$skill_list = SkillList::all();

	 	return view('skill_list.index', ['skill_list' => $skill_list]);    
	}

    /**
     * Display create form for SkillList entry
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function create(){
		return view('skill_list.create' ) ;
	}

    /**
     * Save newly created SkillList entry
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Display single SkillList entry index $id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
	public function show( Request $request ,SkillList $skill_list ){

	   $policy = policy($skill_list)->show($request->user(), $skill_list) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }
        // show the view and pass the nerd to it
        return view('skill_list.show', ['skill_list'=>$skill_list] );
	}

    /**
     * Display edit form for SkillList entry index $id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
	public function edit( Request $request ,SkillList $skill_list ){

	   $policy = policy($skill_list)->edit($request->user(), $skill_list) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }

        // show the view and pass the nerd to it
        return view('skill_list.edit', ['skill_list'=>$skill_list] );
		
	}

    /**
     * Save updated SkillList entry index $id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function update( Request $request ,SkillList $skill_list ){
		$this->validate($request, [
		     'name' => 'required|max:255'
		]);
		
	   $policy = policy($skill_list)->update($request->user(), $skill_list) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }

		$skill_list->name = $request->name;
		$skill_list->version = $request->version;
		$skill_list->experience = $request->experience;
		$skill_list->user_id = $request->user()->id;
		$skill_list->save();
		
      Session::flash('message', 'Successfully Updated skill_list!');
            
      return redirect('skill_list') ;
	}

    /**
     * destroy - NOT IMPLEMENTED
     *
     * @param $id
     */
	public function destroy( SkillList $skill_list ){
	}

}
