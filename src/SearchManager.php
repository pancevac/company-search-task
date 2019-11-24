<?php


class SearchManager
{
    /**
     * List of companies.
     *
     * @var array
     */
    protected $companies;

    /**
     * @param array $companies
     */
    public function __construct(array $companies)
    {
        $this->companies = $companies;
    }

    /**
     * Return list of approved companies.
     *
     * @param array $candidateProperties
     * @return array
     */
    public function getApprovedCompanies(array $candidateProperties): array
    {
        $approvedCompanies = [];

        foreach ($this->companies as $company) {

            // First we need to check if all required(AND) rules are satisfied
            $requiredRules = $company->getRules()->required;
            $requiredPassed = true;

            if ($requiredRules) {
                // check if "every" rule match from candidate properties array
                // if missing, company isn't pass validation.
                // by default, if there is no required rules defined, company passed required rules...
                foreach ($requiredRules as $rule) {
                    if (!in_array($rule, $candidateProperties)) {
                        $requiredPassed = false;
                    }
                }
            }

            // Next, we need to check if any of optional rules are satisfied
            $optionalRules = $company->getRules()->optional;
            $optionalPassed = false;

            if ($optionalRules) {
                // check if "any" match from candidate properties array
                // if missing, company isn't pass validation.
                // by default, if there is no optional rules defined, company passed optional rules...
                foreach ($optionalRules as $rule) {
                    if (in_array($rule, $candidateProperties)) {
                        $optionalPassed = true;
                    }
                }
            } else $optionalPassed = true;

            if ($requiredPassed && $optionalPassed) {
                $approvedCompanies[] = $company;
            }

        }

        return $approvedCompanies;
    }
}