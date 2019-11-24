<?php


class Company
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var object
     */
    protected $rules;

    /**
     * @param string $name
     * @param object $rules
     */
    public function __construct(string $name, object $rules)
    {
        $this->name = $name;
        $this->rules = $rules;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getRules(): object
    {
        return $this->rules;
    }
}