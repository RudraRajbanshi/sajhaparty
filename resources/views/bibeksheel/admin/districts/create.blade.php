@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('global.create') }} {{ trans('cruds.district.title_singular') }}
					</h6>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
		@parent
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.districts.store") }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.district.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.district.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="district_code">{{ trans('cruds.district.fields.district_code') }}</label>
                <input class="form-control {{ $errors->has('district_code') ? 'is-invalid' : '' }}" type="text" name="district_code" id="district_code" value="{{ old('district_code', '') }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.district.fields.district_code_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label>{{ trans('cruds.district.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\District::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.district.fields.status_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="province_id">{{ trans('cruds.district.fields.province') }}</label>
                <select data-toggle="select" class="form-control select2 {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province_id" id="province_id" required>
                    @foreach($provinces as $id => $province)
                        <option value="{{ $id }}" {{ old('province_id') == $id ? 'selected' : '' }}>{{ $province }}</option>
                    @endforeach
                </select>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.district.fields.province_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.district.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}">
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.district.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection