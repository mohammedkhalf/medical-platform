<?php

namespace App\Http\Controllers\Backend\Analysis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Analysis;
use App\Repositories\Backend\AnalysisRepository;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class AnalysisTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FaqsRepository
    */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\FaqsRepository $faqs
     */
    public function __construct(AnalysisRepository $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(Request $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->editColumn('id', function ($analysis) {
                return $analysis->id;
            })
            ->editColumn('name', function ($analysis) {
                return $analysis->name;
            })

             ->editColumn('status', function ($analysis) {
                return $analysis->status == 1 ? 'active' : 'Disabled';
            })
            ->editColumn('created_at', function ($analysis) {
                return Carbon::parse($analysis->created_at)->toDateString();
            })
            ->addColumn('actions', function ($analysis) {

                $btn = '<a href="'.route('admin.analysis.edit', $analysis).'" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>';
                $btn = $btn.'<a href="'.route('admin.analysis.destroy',$analysis).'"
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
