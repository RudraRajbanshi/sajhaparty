@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('global.create') }} {{ trans('cruds.province.title_singular') }}
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
        @parent
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.provinces.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.province.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="province_code">{{ trans('cruds.province.fields.province_code') }}</label>
                <input class="form-control {{ $errors->has('province_code') ? 'is-invalid' : '' }}" type="text" name="province_code" id="province_code" value="{{ old('province_code', '') }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.province_code_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label>{{ trans('cruds.province.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Province::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'inactive') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.status_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.province.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}">
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.remarks_helper') }}</span>
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