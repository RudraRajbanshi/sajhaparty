@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans("global.{$action}") }} {{ trans('cruds.member.title_singular') }}
					</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
        <div id="app">
            <membership-component
                :lang="{{json_encode(trans('cruds.member.fields'))}}"
                :identity-types = "{{json_encode(App\Member::IDENTITY_TYPE_SELECT)}}"
                :countries="{{json_encode(App\Member::COUNTRY_SELECT)}}"
                :currencies="{{json_encode(App\Member::CURRENCY_SELECT)}}"
                :statuses="{{json_encode(App\Member::STATUS_SELECT)}}"
                :help-types="{{json_encode(App\Member::HELP_TYPE_SELECT)}}"
                :payment-types="{{json_encode(App\Member::PAYMENT_TYPE_SELECT)}}"
                :availability-types="{{json_encode(App\Member::AVAILABILITY_SELECT)}}"
                :group-types="{{json_encode(App\Member::GROUP_SELECT)}}"
                :occupation-types="{{json_encode(App\Member::OCCUPATION_SELECT)}}"
                :interested-department-types="{{json_encode(App\Member::INTERESTED_DEPARTMENT_SELECT)}}"
                :membership-code = "{{json_encode($membership_code ?? '')}}"
                :redirect-url = "{{json_encode(route('admin.members.choose.membership-code'))}}"
                :blood-groups = "{{json_encode(App\Member::BLOOD_GROUPS_SELECT)}}"
                :option = "{{json_encode($option??'') ?? null}}"
                :edit-data = "{{json_encode($memberData??'') ?? null}}"
                :form-sources="{{json_encode(App\FormSource::FORM_SOURCE_SELECT)}}"
            ></membership-component>
        </div>
    </div>

    <script src="{{URL::to('js/app.js')}}"></script>
</div>



@endsection
