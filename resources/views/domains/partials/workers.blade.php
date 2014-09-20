<div class="page-header">
    New Worker
</div>
{{ Form::open() }}
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
    {{ Form::label('rest_seconds_when_empty', null, ['class' => 'control-label']) }}
    {{ Form::text('rest_seconds_when_empty', 10, ['class' => 'form-control', 'placeholder' => '10']) }}
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
{{ Form::close() }}