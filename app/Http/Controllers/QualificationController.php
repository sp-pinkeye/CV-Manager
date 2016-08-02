<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QualificationController extends Controller
{
    /**
     * List all Qualifications
     *
     * @return View
     */
    public function index(){

        $qualifications = Qualification::all();

        return view('qualification.index', ['qualification' => $qualifications ]);
    }

    /**
     * Display Qualification create form
     *
     * @param Request $request
     * @return View
     */
    public function create(Request $request){

        return view('qualification.create' ) ;
    }

    /**
     * Save newly created Qulification data.
     *
     * @param Request $request
     * @return Redirector
     */
    public function store( Request $request ){

        $this->validate($request, [
            'subject' => 'required|max:255',
            'level' => 'required|max:255',
            'grade' => 'required|max:255',
            'user_id' => 'required',

        ]);

        $qualification = new Qualification;
        $qualification->subject = $request->subject;
        $qualification->user_id = $request->user_id;
        $qualification->level = $request->level;
        $qualification->grade = $request->grade;

        $qualification->save();

        Session::flash('message', 'Successfully created Qualification!');

        return redirect('qualification') ;
    }

    /**
     * Display a single Qualification index $id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show( Request $request, Qualification $qualification ){

        $policy = policy($qualification)->show($request->user(), $qualification) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }

        // Order the jobs by featured then start date
        return view('qualification.show', ['qualification'=>$qualification ]);
    }

    /**
     * Display edit form for Qulification index $id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(  Request $request, $id ){

        $qualification = Qualification::find($id);
        $policy = policy($qualification)->show($request->user(), $qualification) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }
        return view('qualification.edit', ['qualification'=>$qualification ] );

    }

    /**
     * Update edited Qualification index $id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update( Request $request, Qualification $qualification ){

        $this->validate($request, [
            'subject' => 'required|max:255',
            'level' => 'required|max:255',
            'grade' => 'required|max:255'
        ]);
        $policy = policy($qualification)->show($request->user(), $qualification) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }
        $qualification->subject = $request->subject;
        $qualification->level = $request->level;
        $qualification->grade = $request->grade;

        $qualification->save();

        Session::flash('message', 'Successfully Updated Qualification!');

        return redirect('qualification') ;
    }

    /**
     * destroy - NOT IMPLEMENTED
     * @param $id
     */
    public function destroy( Qualification $qualification ){
    }

}
