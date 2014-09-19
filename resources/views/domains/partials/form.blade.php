@if(count($errors->all()))
@include('partials.errors')
@endif
{{ Form::open(['route' => 'admin.domains.store']) }}
<div class="form-group">
    {{ Form::label('name', 'Root domain', ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Root Domain Name']) }}
</div>
<div class="form-group">
    {{ Form::label('directory', 'Web Directory (Optional)', ['class' => 'control-label']) }}
    {{ Form::text('directory', 'public', ['class' => 'form-control', 'placeholder' => 'Web Directory (Optional)']) }}
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {{ Form::checkbox('allowWildcard', 1, null) }} Allow Wildcard Sub-Domains
        </label>
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Create Domain', ['class' => 'btn btn-default']) }}
</div>
{{ Form::close() }}