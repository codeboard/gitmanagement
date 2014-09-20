@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Create Domain</h2>
            </div>
            @include('domains.partials.form')
            <div class="page-header">
                <h2>Domains</h2>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Domain Name</th>
                    <th>Directory</th>
                    <th>Wildcards</th>
                    <th>App</th>
                    <th>Workers</th>
                    <th>SSL</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @forelse($domains as $domain)
                <tr>
                    <td>{{ $domain->present()->name }}</td>
                    <td>/{{ $domain->present()->directory }}</td>
                    <td>{{ $domain->present()->allowWildcards }}</td>
                    <td>
                        @if($domain->app)
                        {{ $domain->app->present()->name }}
                        @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{ route('admin.domains.show', $domain->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('admin.domains.destroy', $domain->id) }}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No domains created yet</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop