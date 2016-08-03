<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Education;
use App\Address;
use Auth ;

use App\Helpers;

use Carbon\Carbon;
use Session;

class EducationController extends Controller
{
    /**
     * index - list all Educational Establishments
     *
     * @return View
     */
    public function index(){

        $educations = Education::all();

        return view('education.index', ['education' => $educations ]);
    }

    /**
     * create - display the create form for Educational establishment
     *
     * @param Request $request
     * @return View
     */
    public function create(Request $request){

        return view('education.create' ) ;
    }

    /**
     * store - saves the Education created using the create form
     *
     * @param Request $request
     * @return Redirector
     */
    public function store( Request $request ){

        // Validate all fields
        // Lets make it necessary for start and end date
        // and at least one qualification
        $this->validate($request, [
            'establishment' => 'required|max:255',
            'user_id' => 'required',
            'start' =>'required|date',
            'end' =>'required|date',
            'qualification.*.level' => 'required|string',
            'qualification.*.subject' => 'required|string',
            'qualification.*.grade' => 'required|string'

        ]);

        $education = new Education;
        $education->establishment = $request->establishment;
        $education->user_id = $request->user_id;
        $education->start = $request->start;
        $education->end = $request->end;

        $education->save();

        $education->address()->create(
            ['address1' => $request->address1,
            'address2' => $request->address2,
            'address3' => $request->address3,
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->postcode,
            'country' => $request->country,
            'user_id'=>$request->user_id
            ]
        ) ;
        // I need to add user ID so loop through and add
        foreach( $request->qualification as $qualification ){
            $qualification['user_id'] = $request->user_id ;
            $education->qualifications()->create( $qualification ) ;
        }

        Session::flash('message', 'Successfully created Education!');

        return redirect('education') ;
    }

    /**
     * show - show a single Educational establishment index $id
     *
     * @param Request $request
     * @param $id
     * @return View
     */
    public function show( Request $request, Education $education ){

        $policy = policy($education)->show($request->user(), $education) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }
        // Order the jobs by featured then start date
        return view('education.show', ['education'=>$education ]);
    }

    /**
     * edit - show the edit form for Educational establishment index $id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(  Request $request, Education $education ){

        $policy = policy($education)->show($request->user(), $education) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }
        return view('education.edit', ['education'=>$education ] );

    }

    /**
     * update - save updated details of Educational establishment index $id
     *
     * @param Request $request
     * @param $id
     * @return Redirector
     */
    public function update( Request $request, Education $education ){

        $this->validate($request, [
            'establishment' => 'required|max:255',
            'start' => 'date|required',
            'end' => 'date|required'

        ]);
        $policy = policy($education)->show($request->user(), $education) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }
        $education->establishment = $request->establishment;
        $education->start = $request->start;
        $education->end = $request->end;

        $education->save();

        // Is there a cleaner way to do this
        if( $education->address ){
            $education->address->update( $request->address );
        }else{
            $education->address()->create( $request->address );
        }

        Session::flash('message', 'Successfully Updated Education!');

        return redirect('education') ;
    }

    /**
     * destroy - NOT IMPLEMENTED
     * @param $id
     */
    public function destroy( Education $education ){
    }

}
