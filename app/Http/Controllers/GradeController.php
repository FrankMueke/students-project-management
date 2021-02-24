<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grade;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user();
        $grades= Grade::orderBy('total', 'DESC')->get();

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
            'user_id' => 'required|unique:grades,user_id',
            'proposal' => 'sometimes',
            'progress' => 'sometimes|max:35',
            'final' => 'sometimes|max:65',
            'total' => 'sometimes|max:100'
        ));
        $grade = new Grade();

        $grade->user_id = $request->user_id;
        $grade->proposal = $request->proposal;
        $grade->progress = $request->progress;
        $grade->final = $request->final;
        $grade->total = $request->progress + $request->final;
        $grade['supervisor_id'] = Auth::user()->id;
        $grade->agp = '';
        if($grade->total >=0 && $grade->total<= 49){
                $grade->agp = 'Fail';
            }else if($grade->total > 49 && $grade->total <= 59){
                $grade->agp = 'C';
            }else if($grade->total > 59 && $grade->total <=69){
                $grade->agp = 'B';
            }else if($grade->total > 69 && $grade->total <=100){
                $grade->agp = 'A';
            }


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
        $user = User::find($id);
        $grades = Grade::where('user_id', auth()->id())->get();
        return view('grades.show')->withUser($user)->withGrades($grades);
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
            'progress' => 'numeric|sometimes|max:35',
            'final' => 'numeric|sometimes|max:65',
        ));
        $grade = Grade::find($id);

        $grade->user_id = $request->input('user_id');
        $grade->proposal = $request->input('proposal');
        $grade->progress = $request->input('progress');
        $grade->final = $request->input('final');
        $grade->total = $request->input('progress') + $request->input('final');
        $grade->agp = '';
        if($grade->total >=0 && $grade->total<= 49){
                $grade->agp = 'Fail';
            }else if($grade->total > 49 && $grade->total <= 59){
                $grade->agp = 'C';
            }else if($grade->total > 59 && $grade->total <=69){
                $grade->agp = 'B';
            }else if($grade->total > 69 && $grade->total <=100){
                $grade->agp = 'A';
            }


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
