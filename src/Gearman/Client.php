<?php

namespace Bavix\Gearman;

class Client extends \GearmanClient
{

    /**
     * Runs a single high priority task and returns a string representation of the
     * result. It is up to the GearmanClient and GearmanWorker to agree on the format
     * of the result. High priority tasks will get precedence over normal and low
     * priority tasks in the job queue.
     *
     * @link http://php.net/manual/en/gearmanclient.dohigh.php
     * @param string $function_name
     * @param string $workload
     * @param string $unique
     * @return string A string representing the results of running a task
     */
    public function doHigh($function_name, $workload, $unique = null)
    {
        return parent::doHigh(
            Task::getName($function_name),
            $workload,
            $unique
        );
    }

    /**
     * Runs a single task and returns a string representation of the
     * result. It is up to the GearmanClient and GearmanWorker to agree on the format
     * of the result. Normal and high priority tasks will get precedence over low
     * priority tasks in the job queue.
     *
     * @link http://php.net/manual/en/gearmanclient.dolow.php
     * @param string $function_name
     * @param string $workload
     * @param string $unique
     * @return string A string representing the results of running a task
     */
    public function doNormal($function_name, $workload, $unique = null)
    {
        return parent::doNormal(
            Task::getName($function_name),
            $workload,
            $unique
        );
    }

    /**
     * Runs a single low priority task and returns a string representation of the
     * result. It is up to the GearmanClient and GearmanWorker to agree on the format
     * of the result. Normal and high priority tasks will get precedence over low
     * priority tasks in the job queue.
     *
     * @link http://php.net/manual/en/gearmanclient.dolow.php
     * @param string $function_name
     * @param string $workload
     * @param string $unique
     * @return string A string representing the results of running a task
     */
    public function doLow($function_name, $workload, $unique = null)
    {
        return parent::doLow(
            Task::getName($function_name),
            $workload,
            $unique
        );
    }

    /**
     * Runs a task in the background, returning a job handle which can be used to get
     * the status of the running task.
     *
     * @link http://php.net/manual/en/gearmanclient.dobackground.php
     * @param string $function_name
     * @param string $workload
     * @param string $unique
     * @return string The job handle for the submitted task
     */
    public function doBackground($function_name, $workload, $unique = null)
    {
        return parent::doBackground(
            Task::getName($function_name),
            $workload,
            $unique
        );
    }

    /**
     * Runs a high priority task in the background, returning a job handle which can be
     * used to get the status of the running task. High priority tasks take precedence
     * over normal and low priority tasks in the job queue.
     *
     * @link http://php.net/manual/en/gearmanclient.dohighbackground.php
     * @param string $function_name
     * @param string $workload
     * @param string $unique
     * @return string The job handle for the submitted task
     */
    public function doHighBackground($function_name, $workload, $unique = null)
    {
        return parent::doHighBackground(
            Task::getName($function_name),
            $workload,
            $unique
        );
    }

    /**
     * Runs a low priority task in the background, returning a job handle which can be
     * used to get the status of the running task. Normal and high priority tasks take
     * precedence over low priority tasks in the job queue.
     *
     * @link http://php.net/manual/en/gearmanclient.dolowbackground.php
     * @param string $function_name
     * @param string $workload
     * @param string $unique
     * @return string The job handle for the submitted task
     */
    public function doLowBackground($function_name, $workload, $unique = null)
    {
        return parent::doLowBackground(
            Task::getName($function_name),
            $workload,
            $unique
        );
    }

    /**
     * Adds a task to be run in parallel with other tasks. Call this method for all the
     * tasks to be run in parallel, then call GearmanClient::runTasks to perform the
     * work. Note that enough workers need to be available for the tasks to all run in
     * parallel.
     *
     * @link http://php.net/manual/en/gearmanclient.addtask.php
     * @param string $function_name
     * @param string $workload
     * @param mixed $context
     * @param string $unique
     * @return \GearmanTask A GearmanTask object or false if the task could not be added
     */
    public function addTask($function_name, $workload, $context = null, $unique = null)
    {
        return parent::addTask(
            Task::getName($function_name),
            $workload,
            $context,
            $unique
        );
    }

    /**
     * Adds a high priority task to be run in parallel with other tasks. Call this
     * method for all the high priority tasks to be run in parallel, then call
     * GearmanClient::runTasks to perform the work. Tasks with a high priority will be
     * selected from the queue before those of normal or low priority.
     *
     * @link http://php.net/manual/en/gearmanclient.addtaskhigh.php
     * @param string $function_name
     * @param string $workload
     * @param mixed $context
     * @param string $unique
     * @return \GearmanTask A GearmanTask object or false if the task could not be added
     */
    public function addTaskHigh($function_name, $workload, $context = null, $unique = null)
    {
        return parent::addTaskHigh(
            Task::getName($function_name),
            $workload,
            $context,
            $unique
        );
    }

    /**
     * Adds a low priority background task to be run in parallel with other tasks. Call
     * this method for all the tasks to be run in parallel, then call
     * GearmanClient::runTasks to perform the work. Tasks with a low priority will be
     * selected from the queue after those of normal or low priority.
     *
     * @link http://php.net/manual/en/gearmanclient.addtasklow.php
     * @param string $function_name
     * @param string $workload
     * @param mixed $context
     * @param string $unique
     * @return \GearmanTask A GearmanTask object or false if the task could not be added
     */
    public function addTaskLow($function_name, $workload, $context = null, $unique = null)
    {
        return parent::addTaskLow(
            Task::getName($function_name),
            $workload,
            $context,
            $unique
        );
    }

    /**
     * Adds a background task to be run in parallel with other tasks. Call this method
     * for all the tasks to be run in parallel, then call GearmanClient::runTasks to
     * perform the work.
     *
     * @link http://php.net/manual/en/gearmanclient.addtaskbackground.php
     * @param string $function_name
     * @param string $workload
     * @param mixed $context
     * @param string $unique
     * @return \GearmanTask A GearmanTask object or false if the task could not be added
     */
    public function addTaskBackground($function_name, $workload, $context = null, $unique = null)
    {
        return parent::addTaskBackground(
            Task::getName($function_name),
            $workload,
            $context,
            $unique
        );
    }

    /**
     * Adds a high priority background task to be run in parallel with other tasks.
     * Call this method for all the tasks to be run in parallel, then call
     * GearmanClient::runTasks to perform the work. Tasks with a high priority will be
     * selected from the queue before those of normal or low priority.
     *
     * @link http://php.net/manual/en/gearmanclient.addtaskhighbackground.php
     * @param string $function_name
     * @param string $workload
     * @param mixed $context
     * @param string $unique
     * @return \GearmanTask A GearmanTask object or false if the task could not be added
     */
    public function addTaskHighBackground($function_name, $workload, $context = null, $unique = null)
    {
        return parent::addTaskHighBackground(
            Task::getName($function_name),
            $workload,
            $context,
            $unique
        );
    }

    /**
     * Adds a low priority background task to be run in parallel with other tasks. Call
     * this method for all the tasks to be run in parallel, then call
     * GearmanClient::runTasks to perform the work. Tasks with a low priority will be
     * selected from the queue after those of normal or high priority.
     *
     * @link http://php.net/manual/en/gearmanclient.addtasklowbackground.php
     * @param string $function_name
     * @param string $workload
     * @param mixed $context
     * @param string $unique
     * @return \GearmanTask A GearmanTask object or false if the task could not be added
     */
    public function addTaskLowBackground($function_name, $workload, $context = null, $unique = null)
    {
        return parent::addTaskLowBackground(
            Task::getName($function_name),
            $workload,
            $context,
            $unique
        );
    }

}
