<?php  namespace Codeboard\Workers;
interface WorkerListener {

    /**
     * @param null $data
     * @return mixed
     */
    public function redirectWorker($data = null);

} 