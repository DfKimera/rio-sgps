@php
	/* @var $family \SGPS\Entity\Family */
@endphp
<div class="row">
	<div class="col-md-12">
		<label class="detail__label">OPERADORES ATRIBUÍDOS</label>

		<div class="row">

			<div class="col-md-12 text-center">
				<button type="button" class="btn btn-lg btn-primary" @click="assignUser()"><i class="fa fa-plus"></i> Atribuir operador</button>
				<hr />
			</div>

			<table class="table">
				<thead>
					<tr>
						<th>Operador</th>
						<th>Tipo de atribuição</th>
						<th>Data</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					@foreach($family->assignments as $assignment)
						<tr>
							<td><i class="fa fa-user"></i> {{$assignment->user->name}}</td>
							<td>{{$assignment->type}}</td>
							<td>{{$assignment->created_at}}</td>
							<td>
								<button type="button" @click="unassignUser('{{$assignment->user_id}}')" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>