@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="">
		<h3>
			Role Management

			<div class="pull-right">
				<a href="{{{ URL::to('admin/roles/create') }}}" class="button small iframe"><span class="fa fa-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

	<table id="roles" class="responsive">
		<thead>
			<tr>
				<th class="col-md-6">{{{ Lang::get('admin/roles/table.name') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/roles/table.users') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/roles/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th class="col-md-6">{{{ Lang::get('admin/roles/table.name') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/roles/table.users') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/roles/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</tfoot>
		<tbody>
		</tbody>
	</table>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var table;
		$(document).ready(function() {
				// Setup - add a text input to each footer cell
		    $('#roles tfoot th').each( function () {
		        var title = $('#roles thead th').eq( $(this).index() ).text();
		        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
		    } );

			table = $('#roles').DataTable({
				responsive: true,
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/roles/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});

			// Apply the search
		    table.columns().eq( 0 ).each( function ( colIdx ) {
		        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
		            table
		                .column( colIdx )
		                .search( this.value )
		                .draw();
		        } );
		    } );
		});
	</script>
@stop