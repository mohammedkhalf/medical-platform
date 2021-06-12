<?php

namespace App\Http\Controllers\Backend\Specialists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Backend\SpecialistsRepository;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Models\Specialist;

class SpecialistControllerTable extends Controller
{
    protected $repository;
    /**
     * @param \App\Repositories\Backend\FaqsRepository $faqs
     */
    public function __construct(SpecialistsRepository $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(Request $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->editColumn('id', function ($specialist) {
                return $specialist->id;
            })
            ->editColumn('name', function ($specialist) {
                return $specialist->name;
            })
            ->editColumn('status', function ($specialist) {
                return $specialist->status == 1 ? 'active' : 'disabled';
            })
            ->addColumn('actions', function ($specialist) {

                $btn = '<a href="'.route('admin.specialists.edit', $specialist).'" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                       </a>';
                $btn = $btn.'<a href="'.route('admin.specialists.destroy', $specialist).'"
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
