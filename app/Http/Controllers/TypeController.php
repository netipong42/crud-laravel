<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::paginate(5);
        return view('types.index')->with('types', $types);
    }


    public function create()
    {
        return view('types.create');
    }


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


    public function show(Type $type)
    {
        return view('types.show')->with('type', $type);
    }


    public function edit(Type $type)
    {
        return view('types.edit')->with('type', $type);
    }


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


    public function destroy(Type $type)
    {
        $types = Type::find($type->id);
        $types->delete();
        return redirect()->route('types.index');
    }


    public function test(Type $type)
    {
        dd($type);
    }
}
