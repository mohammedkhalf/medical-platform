<?php

namespace App\Http\Controllers\Backend\Reservations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Backend\Reservations\CreateReservationRequest;
use App\Http\Requests\Backend\Reservations\DeleteReservationRequest;
use App\Http\Requests\Backend\Reservations\EditReservationRequest;
use App\Http\Requests\Backend\Reservations\StoreReservationRequest;
use App\Http\Requests\Backend\Reservations\UpdateReservationRequest;
use App\Http\Requests\Backend\Reservations\ManageReservationRequest;

use App\Http\Responses\ViewResponse;
use App\Models\Profile;
use App\Models\Reservation;
use App\Http\Responses\RedirectResponse;
use App\Models\Specialist;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageReservationRequest $request)
    {
        return new ViewResponse('backend.reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateReservationRequest $request)
    {
        $specialists = Specialist::pluck('name','id');
        return new ViewResponse('backend.reservations.create',compact('specialists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        $reservationData = Reservation::create($request->only('name','age','phone_number','clinic_id','price'));
        Profile::create(['reservation_id'=>$reservationData->id,'patient_name'=>$reservationData->name,'age'=>$reservationData->age,
        'phone_number'=>$reservationData->phone_number,'clinic_id'=>$reservationData->clinic_id]);
        return new RedirectResponse(route('admin.reservations.index'), ['flash_success' => __('alerts.backend.reservations.created')]);
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
    public function edit(EditReservationRequest $request , $id)
    {
        $reservation = Reservation::findOrFail($id);
        $specialists = Specialist::pluck('name','id');
        return new ViewResponse('backend.reservations.edit',compact('reservation','specialists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, $id)
    {
        $reservationObj = Reservation::findOrFail($id);
        $reservationObj->update($request->only('name','age','phone_number','clinic_id','price'));
        Profile::where("reservation_id",$reservationObj->id)->update([
            "patient_name"=>$reservationObj->name,
            "age"=>$reservationObj->age,
            "phone_number"=>$reservationObj->phone_number,
            "clinic_id"=>$reservationObj->clinic_id,
        ]);
        return new RedirectResponse(route('admin.reservations.index'), ['flash_success' => __('alerts.backend.reservations.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteReservationRequest $request , $id)
    {
        $reservationData = Reservation::findOrFail($id);
        $reservationData->delete();
        $reservationData->profile->delete();
        return new RedirectResponse(route('admin.reservations.index'), ['flash_success' => __('alerts.backend.reservations.deleted')]);
    }
}
