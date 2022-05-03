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

		if ($request->ajax()) {
			$data = Event::whereDate('start', '>=', $request->start)
				->whereDate('end',   '<=', $request->end)
				//will only return if the roomid of the event is equal to the room selected
				->where('room', '=', $id)
				->get(['id', 'title', 'room', 'start', 'end']);
			return response()->json($data);
		}

		return view('full-calendar', ['id' => $id]);
	}

	public function action(Request $request)
	{
		
		if ($request->ajax()) {
			if ($request->type == 'add') {

				$event = Event::create([
					'title'		=>	$request->title,
					'room'		=>  $request->room,
					'userid'	=> 	Auth::id(),
					'start'		=>	$request->start,
					'end'		=>	$request->end
				]);

				return response()->json([
					'success' => true,
					'data' => $event
				]);
			} else if ($request->type == 'update') {
				$event = Event::find($request->id);
				//Checking the event belongs to the user or that the user is an admin
				if (!is_null($event) && ($event->userid == Auth::id() or Auth::user()->type == 'admin')) {
					$event->update([
						'title'		=>	$request->title,
						'room'		=>  $request->room,
						'start'		=>	$request->start,
						'end'		=>	$request->end
					]);

					return response()->json([
						'success' => true,
						'data' => $event
					]);
				} else {
					return response()->json([
						'success' => false,
						'error' => 'You cannot update this as it is not your event'
					]);
				}
			} else if ($request->type == 'delete') {
				$event = Event::find($request->id);
				//Checking the event belongs to the user or that the user is an admin
				if (!is_null($event) && ($event->userid == Auth::id() or Auth::user()->type == 'admin')) {
					$event->delete();
					return response()->json([
						'success' => true,
						'data' => $event
					]);
				} else {
					return response()->json([
						'success' => false,
						'error' => 'You cannot delete this as it is not your event'
					]);
				}
			}
		}
	}
}
