<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = Animal::orderBy('id', 'desc')->get();
        return view('admin.token.index')->with(['tokens' => $tokens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sorts = Sort::all();
        return view('admin.token.create')->with(['sorts' => $sorts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('img')->store("tokens/{$request->sort_id}");
        $token = new Animal();
        $token->sort_id = $request->sort_id;
        $token->name = $request->name;
        $token->number = $request->number;
        $token->image = $path;
        $token->save();
        $this->sessionMessages('Ficha registrado');
        return redirect()->route('tokens.index');
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
        $animal = Animal::findOrFail($id);
        return view('admin.token.edit')->with([
            'token' => $animal,
            'sorts' => Sort::all()
        ]);
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
        $animal = Animal::findOrFail($id);
        if ($request->file('img')) {
            $path = $request->file('img')->store("tokens/{$request->sort_id}");
            $animal->image = $path;
        }
        $animal->sort_id = $request->sort_id;
        $animal->name = $request->name;
        $animal->number = $request->number;
        $animal->update();
        $this->sessionMessages('Ficha actualizada');
        return redirect()->route('tokens.index');
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
