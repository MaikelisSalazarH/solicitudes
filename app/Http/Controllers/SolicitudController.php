<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudRequest;
use Inertia\Response;

class SolicitudController extends Controller
{
    const NUMBER_OF_ITEMS_PER_PAGE = 25;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::paginate(self::NUMBER_OF_ITEMS_PER_PAGE);
        return inertia('Solicitudes/Index',['solicitudes'=> $solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Solicitudes/Create');
    }

    
    public function store(SolicitudRequest $request)
    {
        Solicitud::create($request->validated());
        return redirect()->route('solicitudes.index');
    }

    /**
     * Display the specified resource.
     */

    

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        return inertia('Solicitudes/Edit', ['solicitud' => $solicitud]);
    }

    /**
     * Update the specified resource in storage.
     *  @param App\Http\Requests\SolicitudRequest
     *  @return \Illuminate\Http\Response
     */
    public function update(SolicitudRequest $request, Solicitud $solicitud)
    {
        $solicitud->update($request->validated());
        return redirect()->route('solicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitudes.index');
    }
}
