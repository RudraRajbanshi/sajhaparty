@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
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
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data" class="row">
            @method('PUT')
            @csrf
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="mobile_no">{{ trans('cruds.user.fields.mobile_no') }}</label>
                    <input class="form-control {{ $errors->has('mobile_no') ? 'is-invalid' : '' }}" type="text" name="mobile_no"
                        id="mobile_no" value="{{ old('mobile_no', $user->mobile_no) }}" required>
                    @if($errors->has('mobile_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_no') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.mobile_no_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="required" for="status">{{ trans('cruds.user.fields.status') }}</label>
                    <select data-toggle="select" class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                        @foreach($statuses as $key => $value)
                            <option value="{{ $key }}" {{ old('status', $user->status) == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="hierarchy_id">{{ trans('cruds.user.fields.hierarchy_id') }}</label>
                    <select data-toggle="select" class="form-control select2 {{ $errors->has('hierarchy_id') ? 'is-invalid' : '' }}" name="hierarchy_id" id="hierarchy_id" required>
                        @foreach($hierarchies as $id => $title)
                            <option value="{{ $id }}" {{ old('hierarchy_id', $user->userHierarchy->hierarchy_id) == $id ? 'selected' : '' }}>{{ $title }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.hierarchy_id_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="access_location_id">{{ trans('cruds.user.fields.hierarchy_access_location') }}</label>
                    <select data-toggle="select" class="form-control select2 {{ $errors->has('access_location_id') ? 'is-invalid' : '' }}" name="access_location_id" id="access_location_id">
                        @foreach($locations as $id => $name)
                            <option value="{{ $id }}" {{ old('access_location_id', $user->userHierarchy->access_location_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.hierarchy_access_location_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select data-toggle="select" class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                        @foreach($roles as $id => $roles)
                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection