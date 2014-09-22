[program:worker-{{ $worker->id }}]
command=php {{ Config::get('settings.document_location') .'/'. $domain->name }}/artisan queue:work {{ $worker->connection }} --sleep={{ $worker->rest_when_empty }} --tries={{ $worker->maximum_tries }} --daemon --quiet --queue="{{ $worker->queue }}"
autostart=true
autorestart=true
user=dummy
redirect_stderr=true
stdout_logfile={{ Config::get('settings.document_location') }}/logs/worker-{{ $worker->id }}.log