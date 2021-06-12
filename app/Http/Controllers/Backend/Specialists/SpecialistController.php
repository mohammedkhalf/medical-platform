<?php

namespace App\Http\Controllers\Backend\Specialists;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Specialists\CreateSpecialistRequest;
use App\Http\Requests\Backend\Specialists\DeleteSpecialistRequest;
use App\Http\Requests\Backend\Specialists\EditSpecialistRequest;
use App\Http\Requests\Backend\Specialists\ManageSpecialistRequest;
use App\Http\Requests\Backend\Specialists\StoreSpecialistRequest;
use App\Http\Requests\Backend\Specialists\UpdateSpecialistRequest;
use App\Http\Responses\ViewResponse;
use App\Models\Auth\User;
use App\Models\Specialist;
use App\Http\Responses\RedirectResponse;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageSpecialistRequest $request)
    {
        return new ViewResponse('backend.specialists.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateSpecialistRequest $request)
    {
        return new ViewResponse('backend.specialists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialistRequest $request)
    {
        $specialist = Specialist::CreateFromRequest($request);
        return new RedirectResponse(route('admin.specialists.index'), ['flash_success' => __('alerts.backend.specialists.created')]);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditSpecialistRequest $request,$id)
    {
        $specialist = Specialist::findOrFail($id);
        return new ViewResponse('backend.specialists.edit',compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, $id)
    {
        $specialist = Specialist::findOrFail($id);
        $updatedSpecialist = Specialist::UpdateFormRequest($request,$specialist);
        return new RedirectResponse(route('admin.specialists.index'), ['flash_success' => __('alerts.backend.specialists.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteSpecialistRequest $request ,$id)
    {
        $specialistData = Specialist::findOrFail($id);
        $specialistData->delete();
        return new RedirectResponse(route('admin.specialists.index'), ['flash_success' => __('alerts.backend.specialists.deleted')]);
    }
}
