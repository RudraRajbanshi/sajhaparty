@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('cruds.form-codes.title_singular') }} {{ trans('global.list') }}
					</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
					<form method="POST" action="{{ route("admin.members.search") }}" enctype="multipart/form-data">
						@csrf
						<div class="row justify-content-end">
							<div class="col-auto">
								<input class="form-control {{ $errors->has('form_code') ? 'is-invalid' : '' }}" type="text" name="form_code"
									id="form_code" value="" placeholder="Search for form code" required>
							</div>
							<div class="col-auto">
								<button type="submit" class="btn btn-default">
									{{trans('global.search')}}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
		{{-- //parent has notification --}}
		@parent
	</div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FormCodes">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.form-codes.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.form-codes.fields.form_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.form-codes.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($formCodes as $key => $formCode)
                        <tr data-entry-id="{{ $formCode->form_code }}">
                            <td>

                            </td>
                            <td>
                                {{ $formCode->id ?? '' }}
                            </td>
                            <td>
                                <a href="{{route('admin.members.create',['membership_code' => $formCode->form_code ?? ''])}}">
                                    {{ $formCode->form_code ?? '' }}
                                </a>
                            </td>
                            <td>
                                {{ $formCode->statusName ?? '' }}
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="alert alert-neutral">
                Showing
                    <strong> {{(($formCodes->currentpage()-1)*$formCodes->perpage())+1}} </strong>
                to <strong>{{$formCodes->currentpage()*$formCodes->perpage()}}</strong>
                of  <strong>{{$formCodes->total()}} </strong>
                entries
            </div>

            {{$formCodes->links()}}
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'asc' ]],
            pageLength: 100,
        });

        $('.datatable-FormCodes:not(.ajaxTable)').DataTable({
            buttons: dtButtons ,
            paging: false,
            info: false
        })

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    });

</script>
@endsection
