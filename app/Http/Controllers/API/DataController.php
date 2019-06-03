<?php

namespace app\Http\Controllers\API;

use App\data;
use App\Exports\dataExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\data as DataResource;



class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        foreach($request->all() as $user){
            data::create([
                   'username'=>$user['username'],
                   'password'=>$user['password'],
                   'phone'=>$user['phone'],
                   'email'=>$user['email']
            ]);
        }

        return ['message'=>'SUCCESS'];
    }

    public function exportExcel()
    {
        return Excel::download(new dataExport,'data.xls');
    }

    public function getAllData()
    {
        $data = data::all();
        return DataResource::collection($data);
    }

    public function deleteSingleData($data)
    {
        return data::where('username',$data)->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
