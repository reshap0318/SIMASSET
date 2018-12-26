<?php

namespace App\Http\Controllers;

use App\data_master;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    public function index()
    {
        $dataMasters = data_master::all();
        return view('backend.datamaster.index',compact('dataMasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = data_master::find($id)->id;
        return redirect(action('assetController@index', ['data' => $data]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = data_master::find($id);
        dd($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $data = data_master::find($id);
        dd($data);
//        return view('backend.dataMaster.index',compact('role','user','action'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = data_master::find($id);

        if (empty($data)) {
            Flash::error('data not found');

            return redirect(route('datamaster.index'));
        }

//        $data->delete($id);

//        Flash::success('Info deleted successfully.');

        return redirect(route('datamaster.index'));
    }
}
