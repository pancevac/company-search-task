<?php

class CompanyLoader
{
    protected $companies;

    public function __construct(string $filePath)
    {
        $jsonContent = file_get_contents($filePath);
        $this->companies = json_decode($jsonContent);
    }

    /**
     * Load companies
     *
     * @return array
     */
    public function load(): array
    {
        $companiesResource = [];

        // Load companies
        foreach ($this->companies as $company) {
            $companiesResource[] = new Company($company->name, $company->rules);
        }

        return $companiesResource;
    }
}