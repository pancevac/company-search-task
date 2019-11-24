<?php

require __DIR__ . '/src/Company.php';
require __DIR__ . '/src/CompanyLoader.php';
require __DIR__ . '/src/SearchManager.php';

$candidateProperties = ['bike', 'driving_licence'];

$companyLoader = new CompanyLoader('./companies.json');
$companies = $companyLoader->load();

$searchManager = new SearchManager($companies);
$approvedCompanies = $searchManager->getApprovedCompanies($candidateProperties);

foreach ($approvedCompanies as $company) {
    echo $company->getName() . ' matches with candidate properties.' . PHP_EOL;
}