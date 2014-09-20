@if( ! count($domain->app))
<div class="page-header">
    Install Repository
</div>
<div class="alert alert-warning">
    <p>When using Git deployment, you <strong>must</strong> add the following SSH key to your source control provider <strong>before</strong> install the repository:</p>
    <div class="clearfix">
        <div class="form-control clearfix uk-text-break" style="height: inherit; margin: 10px 0 0">ssh-rsa ADDAB3NzaC1yc2EADDADAQABAAABAQCo1iDFTY/PtSe+TqDIHymCc7uKyM6Iqg6XzSTnz5goTHG1+GL/gHrGT/7EsphNZ3nKZzSd93BAm8z2ihmqxRZRunWAi8cg+ina+QFgEZGI+cXYrzSyax9a+/0g62jZU8KMPTKSh5AhOWi/K3VGkm7XDVGAs54zUtG0VSvnaqPTLAt0Rdcoi5A31ShAO80d/4RqRBa37snSf2arsImBZdcBq8jwKlqsZwV8mdPdRNUBRPOWGlxjCihF8fc3nTacOJVjkUYq8PpQhDycX6dCk5oKGykRva/G0XFoZnuAws54ducIlFVySCjKnx4cCRcmYV+1ToLWGPsp2XouQ2V6K8cj root@domainholder</div>
    </div>
</div>
{{ Form::open(['route' => ['admin.app.store', $domain->id]]) }}
<div class="form-group">
    {{ Form::label('url', 'Repository', ['class' => 'control-label']) }}
    {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'git@provider:user/repository.git']) }}
</div>
<div class="form-group">
    {{ Form::label('branch', null, ['class' => 'control-label']) }}
    {{ Form::text('branch', 'master', ['class' => 'form-control', 'placeholder' => 'master']) }}
</div>
<div class="form-group">
    {{ Form::label('installation', 'Installation Options', ['class' => 'control-label']) }}
    <div class="checkbox">
        <label>
            {{ Form::checkbox('run_composer', 1, true) }} Install Composer Dependencies
        </label>
    </div>
    <div class="checkbox">
        <label>
            {{ Form::checkbox('run_migrations', 1, false) }} Run Migrations
        </label>
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Install Repository', ['class' => 'btn btn-default']) }}
</div>
{{ Form::close() }}
@else
<div class="page-header">
    Deployment
</div>
<div class="alert alert-info">
    <p>Quickly deploy allows you to deploy projects when you push to source. When you push to your deploy branch, git management portal will pull your latest code from the source, and runs your deploy script. For example Composer dependencies, and Migrations.</p>
</div>
<a href="#" class="btn btn-info">Enable deploy</a>
<a href="#" class="btn btn-warning">Edit deploy script</a>
<a href="#" class="btn btn-default">View latest deploy log</a>
<a href="#" class="btn btn-success">Deploy now</a>
<div class="page-header">
    Deploy Branch
</div>
<div class="alert alert-info">
    <p>When you push commits to this branch, deploy branch will deploy your fresh code to your site.</p>
</div>
{{ Form::model($domain->app, ['route' => ['admin.app.update', $domain->app->id], 'method' => 'patch']) }}
<div class="form-group">
    {{ Form::label('branch', null, ['class' => 'control-label']) }}
    {{ Form::text('branch', null, ['class' => 'form-control', 'placeholder' => 'Ex: master']) }}
</div>
<div class="form-group">
    {{ Form::submit('Update Branch', ['class' => 'btn btn-default']) }}
</div>
{{ Form::close() }}
<div class="page-header">
    Trigger Deploy URL
</div>
<div class="alert alert-warning">
    <p>http://your.domain.com/sites/deploy/http?token={{ rand(0,1000) }}</p>
</div>
<div class="page-header">
    Uninstall App
</div>
{{ Form::open(['route' => ['admin.app.destroy', $domain->app->id], 'method' => 'delete']) }}
<div class="form-group">
    <div class="checkbox">
        <label>{{ Form::checkbox('rollback_migrations', 1, false) }} Rollback Migrations</label>
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Uninstall Repository', ['class' => 'btn btn-default btn-danger']) }}
</div>
{{ Form::close() }}
@endif