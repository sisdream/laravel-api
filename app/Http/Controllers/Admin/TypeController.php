<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateTypeRequest;
use App\Models\Type;




class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $types = Type::paginate();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $types = new Type;
        return view('admin.types.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(UpdateTypeRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $new_type = new Type;
        $new_type->fill($data);
        $new_type->save();
        return redirect()->route('admin.types.show', $new_type)->with('message', 'Tipo creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * 
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * 
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * 
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $request->validated();
        $data = $request->all();
        $type->update($data);
        return redirect()->route('admin.types.show', compact('type'))->with('message', 'Tipo modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * 
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('message', 'Tipo eliminato con successo');
    }
}