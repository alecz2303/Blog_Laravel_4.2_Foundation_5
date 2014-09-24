@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}
		</h3>
	</div>

	<table id="comments" class="responsive">
		<thead>
			<tr>
				<th class="col-md-3">{{{ Lang::get('admin/comments/table.title') }}}</th>
				<th class="col-md-3">{{{ Lang::get('admin/blogs/table.post_id') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.username') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/comments/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th class="col-md-3">{{{ Lang::get('admin/comments/table.title') }}}</th>
				<th class="col-md-3">{{{ Lang::get('admin/blogs/table.post_id') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.username') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/comments/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</tfoot>
	</table>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var table;
		$(document).ready(function() {
			// Setup - add a text input to each footer cell
		    $('#comments tfoot th').each( function () {
		        var title = $('#comments thead th').eq( $(this).index() ).text();
		        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
		    } );

			table = $('#comments').DataTable({
				responsive: true,
				"sDom": "<'row'<'medium-6 columns'l><'medium-6 columns'f>r>t<'row'<'medium-6 columns'i><'medium-6 columns'p>>",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/comments/data') }}",
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