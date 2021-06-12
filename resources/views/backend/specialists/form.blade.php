<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.specialists.management') }}
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
                {{ Form::label('name', trans('validation.attributes.backend.access.specialists.name'), ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.specialists.name'), 'required' => 'required']) }}
                </div>
              </div>

              <!--status-->
              <div class="form-group row">
                {{ Form::label('status', trans('validation.attributes.backend.access.specialists.status'), ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    @if (!empty($specialist))
                    <select class="form-control"  name="status">
                        <option value="0">Select status</option>
                        <option value="1" {{  $specialist->status == 1 ? 'selected="selected"' : ''  }}}>Active</option>
                        <option value="2" {{  $specialist->status == 2 ? 'selected="selected"' : ''  }}>Disabled</option>
                    </select>
                    @else
                        <select class="form-control"  name="status">
                            <option value="0">Select status</option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : ''  }}>Active</option>
                            <option value="2" {{ old('status') == 2 ? 'selected' : ''  }}>Disabled</option>
                        </select>
                    @endif

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