@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('global.edit') }} {{ trans('cruds.municipality.title_singular') }}
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
        <form method="POST" action="{{ route("admin.municipalities.update", [$municipality->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.municipality.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $municipality->name) }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="district_id">{{ trans('cruds.municipality.fields.district') }}</label>
                <select data-toggle="select" class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district_id" id="district_id" required>
                    @foreach($districts as $id => $district)
                        <option value="{{ $id }}" {{ ($municipality->district ? $municipality->district->id : old('district_id')) == $id ? 'selected' : '' }}>{{ $district }}</option>
                    @endforeach
                </select>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="wards">{{ trans('cruds.municipality.fields.wards') }}</label>
                <input class="form-control {{ $errors->has('wards') ? 'is-invalid' : '' }}" type="number" name="wards" id="wards" value="{{ old('wards', $municipality->wards) }}" step="1" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.wards_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="municipality_code">{{ trans('cruds.municipality.fields.municipality_code') }}</label>
                <input class="form-control {{ $errors->has('municipality_code') ? 'is-invalid' : '' }}" type="text" name="municipality_code" id="municipality_code" value="{{ old('municipality_code', $municipality->municipality_code) }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.municipality_code_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="slug">{{ trans('cruds.municipality.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $municipality->slug) }}">
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.slug_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.municipality.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', $municipality->remarks) }}">
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.remarks_helper') }}</span>
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