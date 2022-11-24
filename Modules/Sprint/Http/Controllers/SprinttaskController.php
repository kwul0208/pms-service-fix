<?php

namespace Modules\Sprint\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sprint\Entities\Sprint;

class SprinttaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($sprint_id, $date)
    {
        $sprints = Sprint::join('sprint_task','sprint.id', '=', 'sprint_task.sprint_id')
        ->join('task','sprint_task.task_id', '=', 'task.id')
     //   ->select('sprint.*', 'sprint_task.*', 'task.name')
        ->where('sprint.id',$sprint_id)->where('sprint_task.date',$date)->get();
       
        return view('sprint::sprinttask.index', compact('sprints'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sprint::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('sprint::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('sprint::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
