<?php

namespace Modules\WorkingHours\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DateTime;
use DatePeriod;
use DateInterval;

class WorkingHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // return view('workinghours::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('workinghours::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $interval = DateInterval::createFromDateString('30 minutes');

        $begin = new DateTime('2017-08-23 1:00:00');
        $end = new DateTime('2017-08-23 5:00:00');
        $end->add($interval);

        $periods = iterator_to_array(new DatePeriod($begin, $interval, $end));
        $start = array_shift($periods);
        foreach ($periods as $time) {
            echo  $start->format('H:iA'), ' - ', $time->format('H:iA')  . '<br>'; 
            $start = $time;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('workinghours::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('workinghours::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
