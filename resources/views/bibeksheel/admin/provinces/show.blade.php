@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('global.show') }} {{ trans('cruds.province.title') }}
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
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.id') }}
                        </th>
                        <td>
                            {{ $province->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.name') }}
                        </th>
                        <td>
                            {{ $province->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.province_code') }}
                        </th>
                        <td>
                            {{ $province->province_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.status') }}
                        </th>
                        <td>
                            {{ App\Province::STATUS_SELECT[$province->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.remarks') }}
                        </th>
                        <td>
                            {{ $province->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
		<div class="form-group">
			<a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
				{{ trans('global.back_to_list') }}
			</a>
		</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#province_districts" role="tab" data-toggle="tab">
                {{ trans('cruds.district.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-panel" role="tabpanel" id="province_districts">
            @includeIf('admin.provinces.relationships.provinceDistricts', ['districts' => $province->provinceDistricts])
        </div>
    </div>
</div>

@endsection
