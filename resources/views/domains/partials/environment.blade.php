<div class="page-header">
    Add Environment Variable
</div>
{{ Form::open(['route' => ['admin.environment.store', $domain->id]]) }}
<div class="form-group">
    {{ Form::label('key', null, ['class' => 'control-label']) }}
    {{ Form::text('key', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<div class="form-group">
    {{ Form::label('value', null, ['class' => 'control-label']) }}
    {{ Form::text('value', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<div class="form-group">
    {{ Form::label('environment', 'Environment (Optional)', ['class' => 'control-label']) }}
    {{ Form::text('environment', null, ['class' => 'form-control', 'placeholder' =>'Optional']) }}
</div>
<div class="form-group">
    {{ Form::submit('Add Environment Variable', ['class' => 'btn btn-default btn-primary']) }}
</div>
{{ Form::close() }}
<div class="page-header">
    Current Variables
</div>
<table class="table">
    <thead>
    <tr>
    <th>Name</th>
    <th>Environment</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($domain->environments as $environment)
    <tr>
        <td>{{ $environment->key }}</td>
        <td>{{ $environment->environment }}</td>
        <td><a href="{{ route('admin.environment.destroy', $environment->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    @empty
    <tr>
        <td colspan="3">No Environment keys set</td>
    </tr>
    @endforelse
    </tbody>
</table>