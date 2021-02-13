<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $grade = Grade::find($id);
        return view('grades.edit')->withGrade($grade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $this->validate($request, array(
            'proposal' => 'sometimes',
            'progress' => 'numeric|min:2|max:2|sometimes',
            'final' => 'numeric|min:2|max:2|sometimes',
            'total' => 'numeric|min:2|max:2|sometimes'
        ));
        $user = User::find($id);
        $grade = Grade::find($id);

        $grade->proposal = $request->proposal;
        $grade->progress = $request->progress;
        $grade->final = $request->final;

        $grade->user()->associate($user);

        $grade->save();

        $request->Session()->flash('success', 'Grade saved successfully');

        return back();






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
