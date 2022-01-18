<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate(5);
        return view('types.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'type_name' => 'required|max:30',
            ],
            [
                'type_name.required' => 'required',
                'type_name.max' => 'max 30 keyword'
            ]
        );

        $prepareData = [
            'type_name' => $request->type_name
        ];
        $Types = Type::create($prepareData);
        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('types.edit')->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {

        $request->validate(
            [
                'type_name' => 'required|max:30'
            ],
            [
                'type_name.required' => 'required',
                'type_name.max' => 'max 30 keyword'
            ]
        );

        $prepareData = ['type_name' => $request->type_name];
        $type = Type::find($type->id);
        $type->update($prepareData);
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $types = Type::find($type->id);
        $types->delete();
        return redirect()->route('types.index');
    }
}
