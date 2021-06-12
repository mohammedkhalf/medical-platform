<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.analysis.management') }}
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->
    <hr>
    <div class="row mt-4 mb-4">
            <div class="col">
                <!--name-->
                <div class="form-group row">
                    {{ Form::label('name', trans('validation.attributes.backend.access.analysis.name'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                        {{ Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.analysis.name'), 'required' => 'required']) }}
                    </div>
                </div>
                <!-- status -->
                <div class="form-group row">
                    {{ Form::label('status', trans('validation.attributes.backend.access.analysis.status'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                        {{ Form::select('status', $analysisStatues, null , ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.analysis.status'), 'required' => 'required']) }}

                    </div>
                </div>



            </div>
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--card-body-->

@section('pagescript')
<script type="text/javascript">

    // console.log("hello")
    FTX.Utils.documentReady(function() {
        FTX.Faqs.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop