<?php

return [
    'document_location' => getenv('DOCUMENT_LOCATION'),
    /*
     * Set your SSH public key location first. This is needed for this App.
     * You could do it here of set een $_ENV variable.
     */
    'ssh_key_location' => getenv('SSH_LOCATION'),
    # You could change this to a real location, but i prefer to do something else
    'nginx_location' => storage_path('nginx'),
    # You could change this to a real location, but i prefer to do something else
    'supervisord_location' => storage_path('supervisor'),
];