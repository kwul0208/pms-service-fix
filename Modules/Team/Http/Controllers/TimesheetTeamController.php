<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Timesheet;

class TimesheetTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($employees_id, $date)
    {
        $timesheets = Timesheet::where('employees_id', $employees_id)->where('date', $date)->get();
        $employees = array(
            105 => 'Mahrizal',
            298 => 'Agus Susanto',
            484 => 'Danti Iswandhari',         
            500 =>  'Nafsirudin',
            526 => 'Wahyu Nur Cahyo'
         );
         $status  = '';
        return view('team::timesheet_team.index', compact('timesheets', 'employees'));
    }

    public function browse($employees_id, $date)
    {
        $timesheets = Timesheet::where('employees_id', $employees_id)->where('date', $date)->get();

        return view('timesheet::browse', compact('timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('timesheet::create');
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
        return view('timesheet::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('timesheet::edit');
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
