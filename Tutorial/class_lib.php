<?php

abstract class AbstractWorker implements WorkerInterface {

    protected $name;

    public function work() {
        echo "I am working";
    }
}

class Person extends AbstractWorker
{
    var $name;

    function __construct($persons_name) {
        $this->name = $persons_name;
    }
    function setName($new_name) {
        $this->name = $new_name;
    }
    function getName() {
        return $this->name;
    }

    function sleep(int $hours)
    {
        // TODO: Implement sleep() method.
    }

    public function getFired()
    {
        // TODO: Implement getFired() method.
    }
}

class Animal
{
    /** @var string */
    protected $name;

    public function getName(): void
    {
        return;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}

interface WorkerInterface
{
    public function work();
    public function getFired();
    public function sleep(int $hours);
}

trait SeriousWorkerTrait {

    protected $name;

    function work() {
        echo "I am working";
    }
}

class Job
{
    protected $applicant;

    public function setApplicant(WorkerInterface $applicant)
    {
        $this->applicant = $applicant;
    }
}

?>