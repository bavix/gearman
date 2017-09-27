<?php

namespace Bavix\Gearman;

class Worker extends \GearmanWorker
{

    /**
     * Registers a function name with the job server with an optional timeout. The
     * timeout specifies how many seconds the server will wait before marking a job as
     * failed. If the timeout is set to zero, there is no timeout.
     *
     * @link http://php.net/manual/en/gearmanworker.register.php
     * @param string $function_name The name of a function to register with the job
     *        server
     * @param int $timeout An interval of time in seconds
     * @return bool A standard Gearman return value
     *
     * @codeCoverageIgnore
     */
    public function register($function_name, $timeout = null)
    {
        return parent::register(
            Task::getName($function_name),
            $timeout
        );
    }

    /**
     * Unregisters a function name with the job servers ensuring that no more jobs (for
     * that function) are sent to this worker.
     *
     * @link http://php.net/manual/en/gearmanworker.unregister.php
     * @param string $function_name The name of a function to register with the job
     *        server
     * @return bool A standard Gearman return value
     *
     * @codeCoverageIgnore
     */
    public function unregister($function_name)
    {
        return parent::unregister(
            Task::getName($function_name)
        );
    }

    /**
     * Registers a function name with the job server and specifies a callback
     * corresponding to that function. Optionally specify extra application context
     * data to be used when the callback is called and a timeout.
     *
     * @link http://php.net/manual/en/gearmanworker.addfunction.php
     * @param string $function_name The name of a function to register with the job
     *        server
     * @param callback $function A callback that gets called when a job for the
     *        registered function name is submitted
     * @param mixed $context A reference to arbitrary application context data that can
     *        be modified by the worker function
     * @param int $timeout An interval of time in seconds
     * @return bool
     *
     * @codeCoverageIgnore
     */
    public function addFunction($function_name, $function, $context = null, $timeout = 0)
    {
        return parent::addFunction(
            Task::getName($function_name),
            $function,
            $context,
            $timeout
        );
    }

}
