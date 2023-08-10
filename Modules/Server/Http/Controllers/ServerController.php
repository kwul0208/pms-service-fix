<?php

namespace Modules\Server\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Server\Entities\ServerEmployeeModel;
use Modules\Server\Entities\ServerModel;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            $data = ServerModel::all();
            return response([
                'status' => 200,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('server::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'username' => 'required',
            'password' => 'required',
            'created_by' => 'required',
            'employees_id' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            $server = ServerModel::create([
                'name' => $request->name,
                'number' => $request->number,
                'username' => $request->username,
                'password' => $request->password,
                'created_by' => $request->created_by,
                'updated_by' => $request->created_by,
            ]);

            for ($i=0; $i < count($request->employees_id); $i++) { 
                ServerEmployeeModel::create([
                    'server_id' => $server->id,
                    'employees_id' => $request->employees_id[$i],
                    'created_by' => $request->created_by
                ]);
            }

            return response([
                'status' => 200,
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        try {
            $data = ServerModel::with('employees')
            ->where('id', $id)
            ->first();

            return response([
                'status' => 200,
                'message' => 'success',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('server::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'username' => 'required',
            'password' => 'required',
            'created_by' => 'required',
            'employees_id' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            $server = ServerModel::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'number' => $request->number,
                'username' => $request->username,
                'password' => $request->password,
                'created_by' => $request->created_by,
                'updated_by' => $request->created_by,
            ]);
            if($request->change_assign == true){
                ServerEmployeeModel::where('server_id', $request->id)->delete();
    
                for ($i=0; $i < count($request->employees_id); $i++) { 
                    ServerEmployeeModel::create([
                        'server_id' => $request->id,
                        'employees_id' => $request->employees_id[$i],
                        'created_by' => $request->created_by
                    ]);
                }
            }
    
            return response([
                'status' => 200,
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            ServerModel::where('id', $request->id)->delete();
            ServerEmployeeModel::where('server_id', $request->id)->delete();

            return response([
                'status' => 200,
                'message' => 'success',
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }
}
