<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.profiles.management') }}
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->
    <hr>
    <div class="row mt-4 mb-4">
        <div class="col">
            <!--patient name -->
            <div class="form-group row">
                {{ Form::label('patientName', trans('validation.attributes.backend.access.profiles.patient_name'), ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::text('patient_name', $profile->patient_name , ['class' => 'form-control','readonly' => 'true', 'required' => 'required']) }}

                </div>
            </div>
             <!--age-->
                <div class="form-group row">
                    {{ Form::label('age', trans('validation.attributes.backend.access.profiles.age'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                        {{ Form::text('age', $profile->age , ['class' => 'form-control','readonly' => 'true', 'required' => 'required']) }}
                    </div>
                </div>

                <!--phone_number-->
                <div class="form-group row">
                    {{ Form::label('phone_number', trans('validation.attributes.backend.access.profiles.phone_number'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('phone_number', $profile->phone_number , ['class' => 'form-control','readonly' => 'true', 'required' => 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('diagnosis', trans('validation.attributes.backend.access.profiles.diagnosis'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('diagnosis', null , ['class' => 'form-control', 'rows'=>'3']) }}
                    </div>
                </div>

                   <!-- analysis type -->
                <div class="form-group row">
                    {{ Form::label('analysis_type', trans('validation.attributes.backend.access.profiles.analysis_type'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('analysis_id', $analysisTypes, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.profiles.choose_analysis_type')]) }}
                    </div>
                </div>

                <!-- analysis Descrption -->
                <div class="form-group row">
                    {{ Form::label('analysis Descrption', trans('validation.attributes.backend.access.profiles.analysis_descrption'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('analysis_description', old('analysis_descrption') , ['class' => 'form-control', 'rows'=>'3']) }}
                    </div>
                </div>

                <!-- first drug -->
                <div class="form-group row">
                    {{ Form::label('first_drug', trans('validation.attributes.backend.access.profiles.first_drug'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('first_drug_id', $drugs, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.profiles.choose_first_drug'), 'required' => 'required']) }}
                    </div>
                </div>

                <!-- first drug Dose -->
                <div class="form-group row">
                    {{ Form::label('first_drug_dose', trans('validation.attributes.backend.access.profiles.first_drug_dose'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('first_drug_dose', $doses, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.profiles.choose_first_dose'), 'required' => 'required']) }}
                    </div>
                </div>

                <!-- second drug -->
                <div class="form-group row">
                    {{ Form::label('second_drug', trans('validation.attributes.backend.access.profiles.second_drug'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('second_drug_id', $drugs, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.profiles.choose_second_drug')]) }}
                    </div>
                </div>

                <!-- second drug Dose -->
                <div class="form-group row">
                    {{ Form::label('second_drug_dose', trans('validation.attributes.backend.access.profiles.second_drug_dose'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('second_drug_dose', $doses, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.profiles.choose_second_dose')]) }}
                    </div>
                </div>

                <!-- third drug -->
                <div class="form-group row">
                    {{ Form::label('third_drug', trans('validation.attributes.backend.access.profiles.third_drug'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('third_drug_id', $drugs, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.profiles.choose_third_drug')]) }}
                    </div>
                </div>

                <!-- third drug Dose -->
                <div class="form-group row">
                    {{ Form::label('second_third_dose', trans('validation.attributes.backend.access.profiles.third_drug_dose'), ['class' => 'col-md-2 from-control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('third_drug_dose', $doses, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.profiles.choose_third_dose')]) }}
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