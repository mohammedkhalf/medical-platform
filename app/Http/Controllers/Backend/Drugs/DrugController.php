<?php

namespace App\Http\Controllers\Backend\Drugs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Drugs\CreateDrugsRequest;
use App\Http\Requests\Backend\Drugs\DeleteDrugsRequest;
use App\Http\Requests\Backend\Drugs\EditDrugsRequest;
use App\Http\Requests\Backend\Drugs\StoreDrugsRequest;
use App\Http\Requests\Backend\Drugs\UpdateDrugsRequest;
use App\Http\Requests\Backend\Drugs\ManageDrugsRequest;
use Illuminate\Http\Request;
use App\Http\Responses\ViewResponse;
use App\Repositories\Backend\DrugsRepository;
use App\Models\Drug;
use App\Models\Specialist;
use App\Http\Responses\RedirectResponse;

class DrugController extends Controller
{

    protected $repository;
    /**
     * @param \App\Repositories\Backend\FaqsRepository $faq
     */
    public function __construct(DrugsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return new ViewResponse('backend.drugs.index');
    }

    public function create(ManageDrugsRequest $request)
    {
        $specialists =  Specialist::pluck('name','id');
        return new ViewResponse('backend.drugs.create',compact('specialists'));
    }

    public function store(StoreDrugsRequest $request)
    {
        Drug::create($request->only('name','manufacture','amount','price','specialist_id'));
        return new RedirectResponse(route('admin.drugs.index'), ['flash_success' => __('alerts.backend.drugs.created')]);
    }

    public function edit(Drug $drug, ManageDrugsRequest $request)
    {
        $specialists =  Specialist::pluck('name','id');
        return new ViewResponse('backend.drugs.edit', ['drug' => $drug,'specialists'=>$specialists]);
    }

    public function update(Drug $drug,  UpdateDrugsRequest $request)
    {
    	$drug->update($request->only('name','manufacture','amount','amount','price','specialist_id'));
        return new RedirectResponse(route('admin.drugs.index'), ['flash_success' => __('alerts.backend.drugs.updated')]);
    }

    public function destroy(Drug $drug, DeleteDrugsRequest $request)
    {
        $drugData = Drug::findOrFail($drug->id);
        $drugData->delete();
        return new RedirectResponse(route('admin.drugs.index'), ['flash_success' => __('alerts.backend.drugs.deleted')]);
    }

}
