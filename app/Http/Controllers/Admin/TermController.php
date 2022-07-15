<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = Term::orderBy('created_at','DESC')->get();
        return view('admin/term.index',compact('term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/term.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'heading' => 'required|max:255',
                'description' => 'required'
            ]
        );
        $term = new Term;
        $term->heading = $request->heading;
        $term->description = $request->description;
        $term->save();
        return redirect('admin/term')->with('success','Term $ Conditions has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Term::find($id);
        return view('admin/term.edit',compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'heading' => 'required|max:255',
                'description' => 'required'
            ]
        );
        $term = Term::find($id);
        $term->heading = $request->heading;
        $term->description = $request->description;
        $term->update();
        return redirect('admin/term')->with('success','Term & Conditions has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $term = Term::find($request->id);
        $term->delete();
        return response(['message' => 'Term & Conditions delete successfully']);
    }
}
