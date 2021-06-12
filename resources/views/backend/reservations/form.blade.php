<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.reservations.management') }}
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
                    {{ Form::label('name', trans('validation.attributes.backend.access.reservations.name'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                        {{ Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.reservations.name'), 'required' => 'required']) }}
                    </div>
                </div>
                <!-- age -->
                <div class="form-group row">
                    {{ Form::label('age', trans('validation.attributes.backend.access.reservations.age'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                        {{ Form::text('age', old('age') , ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.reservations.age'), 'required' => 'required']) }}
                    </div>
                </div>
                <!-- phone_number -->
                <div class="form-group row">
                    {{ Form::label('phone_number', trans('validation.attributes.backend.access.reservations.phone_number'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                        {{ Form::text('phone_number', old('phone_number') , ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.reservations.phone_number'), 'required' => 'required']) }}
                    </div>
                </div>
                <!-- clinic_id -->
                <div class="form-group row">
                    {{ Form::label('clinic_id', trans('validation.attributes.backend.access.reservations.clinic_id'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                       {{ Form::select('clinic_id', $specialists, null , ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.reservations.clinic_id'), 'required' => 'required']) }}
                    </div>
                </div>
                <!-- price -->
                <div class="form-group row">
                    {{ Form::label('price', trans('validation.attributes.backend.access.reservations.price'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                        {{ Form::text('price', old('price') , ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.reservations.price'), 'required' => 'required']) }}
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