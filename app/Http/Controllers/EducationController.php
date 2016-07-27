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
    public function index(){

        $educations = Education::all();

        return view('education.index', ['education' => $educations ]);
    }
    //
    public function create(Request $request){

        return view('education.create' ) ;
    }

    public function store( Request $request ){

        $this->validate($request, [
            'establishment' => 'required|max:255',
            'user_id' => 'required',

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

        Session::flash('message', 'Successfully created Education!');

        return redirect('education') ;
    }

    public function show( Request $request, $id ){

        $education = Education::with( 'address')->find($id);
        $policy = policy($education)->show($request->user(), $education) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }

        // Order the jobs by featured then start date
        return view('education.show', ['education'=>$education ]);
    }

    public function edit(  Request $request, $id ){

        $education = Education::with( 'address')->find($id);
        $policy = policy($education)->show($request->user(), $education) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }
        return view('education.edit', ['education'=>$education ] );

    }

    public function update( Request $request, $id ){

        $this->validate($request, [
            'establishment' => 'required|max:255',
            'start' => 'date|required',
            'end' => 'date|required'

        ]);
        $education = Education::with( 'address')->find($id);
        $policy = policy($education)->show($request->user(), $education) ;

        if( !$policy  ){
            Session::flash('message', 'Wrong user id contact Administrator!');
            return redirect('/home') ;
        }
        $education->establishment = $request->establishment;
        $education->start = $request->start;
        $education->end = $request->end;

        $education->save();

        $education->address()->update( $request->address );

        Session::flash('message', 'Successfully Updated Education!');

        return redirect('education') ;
    }
    public function destroy( $id ){
    }

}
