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
					@can('form_code_create')
					<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" href="{{ route("admin.settings.form-codes.create") }}">
								{{ trans('global.add') }} {{ trans('cruds.form-codes.title_singular') }}
							</a>
						</div>
					</div>
					@endcan
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

{{-- open print dialog for the pdf of barcodes --}}
    @if(session('print'))
        <div class="modal" tabindex="-1" role="dialog" id="showPdf">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Error during printing barcodes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please click on View Barcode to view barcode and print manually</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.view.pdf.barcodes', ['file' => session('print')])}}" class="btn btn-primary" target="_blank">View Barcode</a>
                </div>
                </div>
            </div>
        </div>

        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
        <script>
            try {
                printJS({
                    printable: "{{Session::get('print')}}",
                    onError: (error)=>{
                        $('#showPdf').modal('show')
                    }
                });
            } catch (error) {
                alert('error'. error);
            }
        </script>
    @endif
<div class="card">
    <div class="card-header">

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
                                {{ $formCode->form_code ?? '' }}
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