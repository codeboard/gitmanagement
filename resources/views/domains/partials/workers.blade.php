<div class="page-header">
    New Worker
</div>
{{ Form::open(['route' => ['admin.workers.store', $domain->id]]) }}
<div class="form-group">
    {{ Form::label('connection', null, ['class' => 'control-label']) }}
    {{ Form::text('connection', 'Beanstalkd', ['class' => 'form-control', 'placeholder' => '']) }}
</div>
<div class="form-group">
    {{ Form::label('queue', null, ['class' => 'control-label']) }}
    {{ Form::text('queue', 'default', ['class' => 'form-control', 'placeholder' => 'default']) }}
</div>
<div class="form-group">
    {{ Form::label('maximum_seconds_per_job', null, ['class' => 'control-label']) }}
    {{ Form::text('maximum_seconds_per_job', 60, ['class' => 'form-control', 'placeholder' => '60']) }}
</div>
<div class="form-group">
    {{ Form::label('rest_when_empty', null, ['class' => 'control-label']) }}
    {{ Form::text('rest_when_empty', 10, ['class' => 'form-control', 'placeholder' => '10']) }}
</div>
<div class="form-group">
    {{ Form::label('maximum_tries', null, ['class' => 'control-label']) }}
    {{ Form::text('maximum_tries', null, ['class' => 'form-control', 'placeholder' => '3']) }}
</div>
<div class="form-group">
    {{ Form::label('environment', 'Environment (Optional)', ['class' => 'control-label']) }}
    {{ Form::text('environment', null, ['class' => 'form-control', 'placeholder' => 'production']) }}
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {{ Form::checkbox('asWorker', 1, null) }} Run Worker as Daemon (Laravel 4.2+ only)
        </label>
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Add new Worker', ['class' => 'btn btn-default']) }}
</div>
{{ Form::close() }}
<div class="page-header">
    Running Workers
</div>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Connection</th>
        <th>Queue</th>
        <th>Timeout</th>
        <th>Sleep</th>
        <th>Tries</th>
        <th>Environment</th>
        <th>Deamon</th>
        <th>Status</th>
        <th>Restart</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($domain->workers as $worker)
    <tr>
        <td>{{ $worker->id }}</td>
        <td>{{ $worker->connection }}</td>
        <td>{{ $worker->queue }}</td>
        <td>{{ $worker->maximum_seconds_per_job }}</td>
        <td>{{ $worker->rest_when_empty }}</td>
        <td>{{ $worker->maximum_tries }}</td>
        <td>{{ $worker->environment }}</td>
        <td><span class="fa fa-close"></span></td>
        <td><span class="fa fa-eye"></span></td>
        <td><span class="fa fa-refresh"></span></td>
        <td><span class="fa fa-close"></span></td>
    </tr>
    @empty
    <tr>
        <td colspan="11">No workers running yet.</td>
    </tr>
    @endforelse
    </tbody>
</table>