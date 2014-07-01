@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>Show Commande</h1>

<p>{{ link_to_route('commandes.index', 'Return to All commandes', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Code</th>
				<th>Id_contrat</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $commande->code }}}</td>
					<td>{{{ $commande->id_contrat }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('commandes.destroy', $commande->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('commandes.edit', 'Edit', array($commande->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop