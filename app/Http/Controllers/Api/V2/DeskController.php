<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use function response;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return DeskResource::collection(Desk::with('lists')->get());
        return DeskResource::collection(Desk::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeskStoreRequest $request)
    {
//        $request->validate([
//            'name' => 'required',
//        ]);

        //$created_desk = Desk::create($request->all());
        $created_desk = Desk::create($request->validated());

        return new DeskResource($created_desk);

        //$created_desk = Desk::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Desk $desk)
    {
        //return new DeskResource(Desk::with('lists')->findOrFail($id));
        return new DeskResource($desk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {
        $desk->update($request->validated());

        return new DeskResource($desk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desk $desk)
    {
        $desk->delete();

        return response(null, 204);
    }
}
