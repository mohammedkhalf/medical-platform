<?php

namespace App\Http\Controllers\Backend\Analysis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Backend\Analysis\CreateAnalysisRequest;
use App\Http\Requests\Backend\Analysis\DeleteAnalysisRequest;
use App\Http\Requests\Backend\Analysis\EditAnalysisRequest;
use App\Http\Requests\Backend\Analysis\StoreAnalysisRequest;
use App\Http\Requests\Backend\Analysis\UpdateAnalysisRequest;
use App\Http\Requests\Backend\Analysis\ManageAnalysisRequest;

use App\Http\Responses\ViewResponse;
use App\Repositories\Backend\AnalysisRepository;
use App\Models\Analysis;
use App\Http\Responses\RedirectResponse;
use Mockery\Matcher\Any;

class AnalysisController extends Controller
{

    protected $repository;
    /**
     * @param \App\Repositories\Backend\FaqsRepository $faq
     */
    public function __construct(AnalysisRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageAnalysisRequest $request)
    {
        return new ViewResponse('backend.analysis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateAnalysisRequest $request)
    {
        $analysisStatues = ['1'=>'active','2'=>'Disabled'];
        return new ViewResponse('backend.analysis.create',compact('analysisStatues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnalysisRequest $request)
    {
        Analysis::create($request->only('name','status'));
        return new RedirectResponse(route('admin.analysis.index'), ['flash_success' => __('alerts.backend.analysis.created')]);

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
    public function edit(EditAnalysisRequest $request , $id)
    {
        $analysis = Analysis::findOrFail($id);
        $analysisStatues = ['1'=>'active','2'=>'Disabled'];
        return new ViewResponse('backend.analysis.edit',compact('analysis','analysisStatues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnalysisRequest $request, $id)
    {
        $analysisData = Analysis::findOrFail($id);
        $analysisData->update($request->only('name','status'));
        return new RedirectResponse(route('admin.analysis.index'), ['flash_success' => __('alerts.backend.analysis.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analysisData = Analysis::findOrFail($id);
        $analysisData->delete();
        return new RedirectResponse(route('admin.analysis.index'), ['flash_success' => __('alerts.backend.analysis.deleted')]);
    }
}
