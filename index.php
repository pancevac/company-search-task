<?php

require 'src/Company.php';
require 'src/CompanyLoader.php';
require 'src/SearchManager.php';

$companyLoader = new CompanyLoader('./companies.json');
$companies = $companyLoader->load();

$candidateProperties = ['bike', 'driving_licence'];

$searchManager = new SearchManager($companies);
$approvedCompanies = $searchManager->getApprovedCompanies($candidateProperties);

foreach ($approvedCompanies as $company) {
    echo $company->getName() . ' matches with your properties.' . PHP_EOL;
}