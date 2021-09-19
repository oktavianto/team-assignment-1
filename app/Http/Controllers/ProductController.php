<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Produk;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = Produk::orderBy('id','DESC')->paginate(10);
        return Inertia::render('Product/Index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Product/Create');
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
            'name'          => 'required',
            'description'   => 'required',
            'buy_price'     => 'required',
            'sell_price'    => 'required',
        ]);

        $request->merge([
            'image' => 'default.png',
        ]);
        if ($request->photo != null){
            $request->validate([
                'photo' => 'mimes:jpeg,jpg,png|max:5000',
            ]);

            $attachment = $request->file('photo');
            $nama_file = time()."_".$attachment->getClientOriginalName();
            $tujuan_upload = 'images';
            $attachment->move($tujuan_upload,$nama_file);
            $request->merge([
                'image' => $nama_file,
            ]);
        }

        $create = Produk::create($request->all());
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
        $data['data'] = Produk::find($id);
        return Inertia::render('Product/Edit', $data);
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
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'buy_price'     => 'required',
            'sell_price'    => 'required',
        ]);

        $data = Produk::find($id);

        if ($request->photo != null){
            $request->validate([
                'photo' => 'mimes:jpeg,jpg,png|max:5000',
            ]);

            $attachment = $request->file('photo');
            $nama_file = time()."_".$attachment->getClientOriginalName();
            $tujuan_upload = 'images';
            $attachment->move($tujuan_upload,$nama_file);
            $data->image = $nama_file;
        }

        $data->name = $request->name;
        $data->description = $request->description;
        $data->buy_price = $request->buy_price;
        $data->sell_price = $request->sell_price;

        if($data->save()){
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
        if (Produk::findOrfail($id)->delete()){
            return redirect()->back()->with('success', 'Success');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
}
