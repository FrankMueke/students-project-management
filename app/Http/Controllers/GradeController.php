<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grade;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user();
        $grades= Grade::all();

        return view('grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('supervisor_id',auth()->id())->get();

        return view('grades.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'user_id' => 'required',
            'proposal' => 'sometimes',
            'progress' => 'numeric|sometimes',
            'final' => 'numeric|sometimes',
            'total' => 'numeric|sometimes'
        ));
        $grade = new Grade();

        $grade->user_id = $request->user_id;
        $grade->proposal = $request->proposal;
        $grade->progress = $request->progress;
        $grade->final = $request->final;


        $grade->save();

        $request->Session()->flash('success', 'Grade saved successfully');

        return back();
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
        $user= Auth::user();
        $users = User::where('supervisor_id', auth()->id())->get();;
        $grade = Grade::find($id);
        return view('grades.edit')->withGrade($grade)->withUsers($users);
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
            'user_id' => 'required',
            'proposal' => 'sometimes',
            'progress' => 'numeric|sometimes',
            'final' => 'numeric|sometimes',
            'total' => 'numeric|sometimes'
        ));
        $grade = Grade::find($id);

        $grade->user_id = $request->user_id;
        $grade->proposal = $request->proposal;
        $grade->progress = $request->progress;
        $grade->final = $request->final;


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
