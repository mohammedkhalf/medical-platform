<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>@lang('labels.backend.access.profiles.table.patient_name')</th>
                <td> {{ $profileData->patient_name }} </td>
            </tr>
            <tr>
                <th>@lang('labels.backend.access.profiles.table.age')</th>
                <td> {{ $profileData->age }}  Year </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.phone_number')</th>
                <td> {{ $profileData->phone_number }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.clinic')</th>
                <td> {{ !empty($profileData->clinic_id)  ? $profileData->specialist->name : '' }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.diagnosis')</th>
                <td> {{ $profileData->diagnosis }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.analysis_type')</th>
                <td> {{ !empty($profileData->analysis_id) ? $profileData->analysis->name : '' }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.analysis_description')</th>
                <td> {{ $profileData->analysis_description }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.first_drug')</th>
                <td> {{ !empty($profileData->first_drug_id) ? App\Models\Drug::findOrFail($profileData->first_drug_id)->name : ''  }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.first_drug_dose')</th>
                <td> @include('backend.profiles.includes.dose', ['dose' => $profileData->first_drug_dose])  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.second_drug')</th>
                <td> {{ !empty($profileData->second_drug_id) ? App\Models\Drug::findOrFail($profileData->second_drug_id)->name : ''  }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.second_drug_dose')</th>
                <td> @include('backend.profiles.includes.dose', ['dose' => $profileData->second_drug_dose]) </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.third_drug')</th>
                <td> {{ !empty($profileData->third_drug_id) ? App\Models\Drug::findOrFail($profileData->third_drug_id)->name : ''  }}  </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.profiles.table.third_drug_dose')</th>
                <td> @include('backend.profiles.includes.dose', ['dose' => $profileData->third_drug_dose]) </td>
            </tr>





        </table>
    </div>
</div><!--table-responsive-->
