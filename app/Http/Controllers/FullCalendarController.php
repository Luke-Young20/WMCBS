<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FullCalendarController extends Controller
{
    public function index(Request $request, $id)
    {
		$userid = Auth::id();
		//dd($userid);

    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('room', '=', $id)
					  // ->where('userid', '=', $userid)
                       ->get(['id', 'title', 'room', /*'userid', */'start', 'end']);
            return response()->json($data);
    	}

    	return view('full-calendar', ['id' => $id]);
    }

    public function action(Request $request)
    {
		$userid = Auth::id();
		//dd($userid);
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{

    			$event = Event::create([
    				'title'		=>	$request->title,
					'room'		=>  $request->room,
					'userid'	=> 	$userid,
					//'userid'	=> Auth::id(),
					//'userid'	=>  $request->$userid,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
/* 				if($event->userid == Auth::id() OR Auth::user()->type == 'admin') {
 */ 
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
					'room'		=>  $request->room,
					//'userid'	=>  $userid,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
				/* 				} else {
					return response()->('message', 'You cannot update this as it is not your event');
				} */
				
    		}

    		if($request->type == 'delete')
    		{
 				if(Auth::user()->type == 'admin') {
     			$event = Event::find($request->id)->delete();
			
    			return response()->json($event);

				} else {
					 alert("You cannot delete this as it is not your event");

					//return response('You cannot delete this as it is not your event');
				} 

			}
    	}
    }
}
?>
