@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('global.show') }} {{ trans('cruds.municipality.title') }}
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
                <a class="btn btn-default" href="{{ route('admin.municipalities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.municipality.fields.id') }}
                        </th>
                        <td>
                            {{ $municipality->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipality.fields.name') }}
                        </th>
                        <td>
                            {{ $municipality->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipality.fields.district') }}
                        </th>
                        <td>
                            {{ $municipality->district->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipality.fields.wards') }}
                        </th>
                        <td>
                            {{ $municipality->wards }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipality.fields.municipality_code') }}
                        </th>
                        <td>
                            {{ $municipality->municipality_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipality.fields.slug') }}
                        </th>
                        <td>
                            {{ $municipality->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipality.fields.remarks') }}
                        </th>
                        <td>
                            {{ $municipality->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.municipalities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
