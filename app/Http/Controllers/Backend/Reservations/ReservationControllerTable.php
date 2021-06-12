<?php

namespace App\Http\Controllers\Backend\Reservations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Backend\ReservationsRepository;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Models\Reservation;

class ReservationControllerTable extends Controller
{
    protected $repository;
    /**
     * @param \App\Repositories\Backend\FaqsRepository $faqs
     */
    public function __construct(ReservationsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->editColumn('id', function ($reservation) {
                return $reservation->id;
            })
            ->editColumn('name', function ($reservation) {
                return $reservation->name;
            })
            ->editColumn('phone_number', function ($reservation) {
                return $reservation->phone_number;
            })
            ->editColumn('age', function ($reservation) {
                return $reservation->age;
            })
            ->editColumn('clinic_id ', function ($reservation) {
                return $reservation->clinic_id;
            })
            ->editColumn('price', function ($reservation) {
                return $reservation->price;
            })
            ->editColumn('created_at', function ($reservation) {
                return $reservation->created_at;
            })
            ->addColumn('actions', function ($reservation) {

                $btn = '<a href="'.route('admin.reservations.edit', $reservation).'" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                       </a>';
                $btn = $btn.'<a href="'.route('admin.reservations.destroy',$reservation).'"
                    class="btn btn-primary btn-danger btn-sm"
                    data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                    <i data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'" class="fa fa-trash"></i>
                    </a>';

                return $btn;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


}
