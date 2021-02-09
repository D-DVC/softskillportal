<?php

namespace App\Http\Controllers;

use App\Models\character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('characters')->get();
        return view('overview', ['data'=>$data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'gender' => 'required',
            'race' => 'required',
            'class' => 'required',
            'name' => 'required',
            'hair' => 'required',
            'skin' => 'required',
            'eyes' => 'required',
            'age' => 'required',
            'size' => 'required',
            'weight' => 'required',
            'appearance' => 'required'
        ]);
        Character::create($request->all());
   
        return redirect()->route('overview')->with('success','uw karakter is aangemaakt.');
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
        //
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
        //
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
