<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = User::orderBy('id','DESC')->paginate(10);
        return Inertia::render('User/Index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->isAdmin();
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->isAdmin();
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'role'                  => 'required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);

        $request->merge([
            'password' => bcrypt($request->password),
        ]);

        $create = User::create($request->all());
        if(isset($create->id)){
            return redirect()->back()->with('success', 'Success');
        }
        return redirect()->back()->with('error', 'Failed');
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
        auth()->user()->isAdmin();
        $data['data'] = User::find($id);
        return Inertia::render('User/Edit', $data);
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
        auth()->user()->isAdmin();
        $request->validate([
            'name'  => 'required',
        ]);

        $data = User::find($id);

        if ($request->password != null) {
            $request->validate([
                'password'              => 'min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6',
            ]);

            $data->password = bcrypt($request->password);
        }

        $data->name = $request->name;
        $data->role = $request->role;
        $data->birthplace = $request->birthplace;
        $data->birthday = $request->birthday;
        $data->sex = $request->sex;

        if ($data->save()) {
            return redirect()->back()->with('success', 'Success');
        }
        return redirect()->back()->with('error', 'Failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->isAdmin();
        if (User::findOrfail($id)->delete()){
            return redirect()->back()->with('success', 'Success');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
}
