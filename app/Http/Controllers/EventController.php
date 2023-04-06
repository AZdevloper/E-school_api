<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Http\Resources\Json\JsonResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Event::all();


        return $classes;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'date' =>
            'date_format:Y-m-d',
            'user_id' => 'required|numeric',

        ]);
        $event = new Event([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => $request->user_id,

        ]);

        $event->save();

        return response([
            'message' => "new event added successfully",

        ], Response::HTTP_CREATED);
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
        //
        $event = Event::findOrFail($id);
        if ($event) {
            return $event;
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
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
        $event = Event::findOrFail($id);
        if ($event) {

            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'date' =>
                'date_format:Y-m-d',
                'user_id' => 'required|numeric',

            ]);

            $event->update([
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
                'user_id' => $request->user_id,
            ]);
            return $event;
        } else {

            return response()->json([
                'message' => 'event not found'
            ], 404);
        }
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
        $event = Event::findOrFail($id);
        if ($event) {
            $event->delete();
            return new JsonResource(["message" => "delete successfully"], 202);
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
    }
}
