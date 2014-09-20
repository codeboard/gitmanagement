<div class="page-header">
    New Certificate
</div>
<ul class="nav nav-pills" role="tablist">
    <li class="active"><a href="#request" role="tab" data-toggle="tab">Create Signing Request</a></li>
    <li><a href="#install" role="tab" data-toggle="tab">Install Existing Certificate</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="request">
        <div class="page-header">
            Create Signing Request
        </div>
        {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('domain', null, ['class' => 'control-label']) }}
            {{ Form::text('domain', null, ['class' => 'form-control', 'placeholder' => 'domain.tld']) }}
        </div>
        <div class="form-group">
            {{ Form::label('country', null, ['class' => 'control-label']) }}
            {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'NL']) }}
        </div>
        <div class="form-group">
            {{ Form::label('State', null, ['class' => 'control-label']) }}
            {{ Form::text('State', null, ['class' => 'form-control', 'placeholder' => 'GR']) }}
        </div>
        <div class="form-group">
            {{ Form::label('city', null, ['class' => 'control-label']) }}
            {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Groningen']) }}
        </div>
        <div class="form-group">
            {{ Form::label('organization', null, ['class' => 'control-label']) }}
            {{ Form::text('organization', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('department', null, ['class' => 'control-label']) }}
            {{ Form::text('department', null, ['class' => 'form-control', 'placeholder' => 'IT']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Create Signing Request', ['class' => 'btn btn-default']) }}
        </div>
        {{ Form::close() }}
    </div>
    <div class="tab-pane" id="install">
        <div class="page-header">
            Install Existing Certificate
        </div>
        {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('private_key', null, ['class' => 'control-label']) }}
            {{ Form::textarea('private_key', null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            {{ Form::label('certificate', null, ['class' => 'control-label']) }}
            {{ Form::textarea('certificate', null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Install Certificate', ['class' => 'btn btn-default']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>