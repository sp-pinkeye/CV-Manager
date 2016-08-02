<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cvs;
use Auth ;

use App\Helpers;

use App\SkillList;
use App\Skills;
use App\Jobs;

use Carbon\Carbon;
use Session;


class CvsController extends Controller
{

    /**
     * index    -   lists all current CV's
     *
     * @return View
     */

	public function index(){
	 
	 	$cvs = Cvs::all();
	 
	 	return view('cvs.index', ['cvs' => $cvs]);    
	}

    /**
     * create - form to create a new CV
     *
     * @param Request $request
     * @return View
     */
	public function create( Request $request ){

		// Get all the CVs for this user

        $jobs = Jobs::where( 'users_id', $request->user()->id)->select( 'company', 'id')->get() ;
        return view('cvs.create', ['jobs'=>$jobs ] ) ;
	}

    /**
     * store - save a new CV .Called form the create form
     *
     * @param Request $request
     * @return redirect to the CV index view
     */
	public function store( Request $request ){
		
		$this->validate($request, [
		     'title' => 'required|max:255',
		     'user_id' => 'required',
		   
		]);
		
		$cv = new Cvs;
		$cv->title = $request->title;
        $cv->user_id = $request->user_id;
        $cv->introduction = $request->introduction;

        // attach or sync new jobs
        $sync = array() ;

        foreach( $request->jobIds as $job ){
            // How do I know if already created and just needs updating
            if( in_array( $job, $request->featureIds ) ){
                $sync[$job] = ['featured'=>true ]  ;
            }else{
                $sync[$job] = ['featured'=>false ]  ;
            }
        }
        $cv->save();
        $cv->jobs()->sync($sync, false);

        Session::flash('message', 'Successfully created CV!');
            
        return redirect('cvs') ;
	}

    /**
     * show - shows a single CV as defined by the $id param
     *
     * @param Request $request
     * @param $id
     * @return View
     */
	public function show( Request $request, Cvs $cv ){
		
 		$policy = policy($cv)->show($request->user(), $cv) ;
      
        if( !$policy  ){
	        Session::flash('message', 'Wrong user id contact Administrator!');
	   	    return redirect('/home') ;
	    }
        // Order the jobs by featured then start date
		return view('cvs.show', ['cv'=>$cv, 'skill_list'=>$cv->user->skill_list ] );
	}

    /**
     * edit - display the edit form and load CV index %id
     *
     * @param Request $request
     * @param $id
     * @return View
     */
	public function edit(  Request $request, Cvs $cv ){

		$policy = policy($cv)->show($request->user(), $cv) ;

        if( !$policy  ){
	        Session::flash('message', 'Wrong user id contact Administrator!');
	   	    return redirect('/home') ;
	    }

	    $jobs = Jobs::where( 'users_id', $request->user()->id)->select( 'company', 'id' )->orderBy( 'start' )->get() ;

        // Somehow we need this ordered by the featured field and date
        $selected = [] ;
        $featured = [] ;

	    foreach( $cv->jobs as $job ){
            $selected[] = $job->id ;
            if($job->pivot->featured){
                $featured[] = $job->id  ;
            }
        }
        $data = array() ;
        foreach( $jobs as $job ){
            $data[] = ['company'=>$job['company'], 'id'=>$job['id'], 'selected'=>in_array( $job['id'], $selected), 'featured'=>in_array( $job['id'], $featured) ] ;
        }
	    return view('cvs.edit', ['cv'=>$cv, 'jobs'=>$data] );
		
	}

    /**
     * update - called by the edit form to update edited CV defin3ed by $id
     *
     * @param Request $request
     * @param $id
     * @return Redirector
     */
	public function update( Request $request, Cvs $cv ){
		
		$this->validate($request, [
		     'title' => 'required|max:255',
		   
		]);

		$policy = policy($cv)->show($request->user(), $cv) ;
      
        if( !$policy  ){
	        Session::flash('message', 'Wrong user id contact Administrator!');
	   	    return redirect('/home') ;
	    }
		$cv->title = $request->title;
        $cv->introduction = $request->introduction;

        // attach or sync new jobs
        $sync = array() ;
        foreach( $request->jobIds as $job ){
            // How do I know if already created and just needs updating
            if( in_array( $job, $request->featureIds ) ){
                $sync[$job] = ['featured'=>true ]  ;
            }else{
                $sync[$job] = ['featured'=>false ]  ;
            }
        }
        $cv->save();
        $cv->jobs()->sync($sync, false);
        Session::flash('message', 'Successfully Updated CV!');
            
        return redirect('cvs') ;
	}

    /**
     * destroy - remove CV ( as yet not implemented )
     * @param $id
     */
	public function destroy( Cvs $cv ){
	}

}
