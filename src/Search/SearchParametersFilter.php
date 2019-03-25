<?php

namespace App\Search;

use Symfony\Component\HttpFoundation\Request;

class SearchParametersFilter
{
    const PARAMETER_QUERY = 'q';
    const PARAMETER_CONTRACT = 'contract';
    const PARAMETER_ISSUE_DATE = 'issueDate';

    const DEFAULT_QUERY = '';
    const DEFAULT_CONTRACT = [];
    const DEFAULT_ISSUE_DATE = '';

    const CONTRACT_CDI = 'cdi';
    const CONTRACT_CDD = 'cdd';
    const CONTRACT_STAGE = 'stage';

    const ISSUE_DATE_1 = '1';
    const ISSUE_DATE_3 = '3';
    const ISSUE_DATE_7 = '7';
    const ISSUE_DATE_14 = '14';
    const ISSUE_DATE_31 = '31';
    const ISSUE_DATE_ALL = '720';

    const ISSUE_DATES = [
        'Un jour' => self::ISSUE_DATE_1,
        'Trois jours' => self::ISSUE_DATE_3,
        'Une semaine' => self::ISSUE_DATE_7,
        'Deux semaines' => self::ISSUE_DATE_14,
        'Un mois' => self::ISSUE_DATE_31,
        'Toutes les offres' => self::ISSUE_DATE_ALL
    ];

    const CONTRACTS = [
        'CDI' => self::CONTRACT_CDI,
        'CDD' => self::CONTRACT_CDD,
        'Stage' => self::CONTRACT_STAGE
    ];

    private $query;

    /**
     * @var array
     */
    private $contracts = [];

    private $issueDate;

    public function __construct()
    {
        $this->query = self::DEFAULT_QUERY;
        $this->contracts = self::DEFAULT_CONTRACT;
        $this->issueDate = self::DEFAULT_ISSUE_DATE;
    }

    public function handleRequest(Request $request)
    {
        if (null !== $query = $request->query->get(self::PARAMETER_QUERY)) {
            $this->setQuery($query);
        };

        if (null !== $contracts = $request->query->get(self::PARAMETER_CONTRACT)) {
            $this->setContract($contracts);
        };

        if (null !== $issueDate = $request->query->get(self::PARAMETER_ISSUE_DATE)) {
            $this->setIssueDate($issueDate);
        };

        return $this;
    }

    /**
     * @param string $query
     * @return SearchParametersFilter
     */
    public function setQuery(string $query): self
    {
        $this->query = trim($query);
        return $this;
    }

    /**
     * @param array $contracts
     * @return SearchParametersFilter
     */
    public function setContract(array $contracts = []): self
    {
        $this->contracts = $contracts;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getContract(): array
    {
        return $this->contracts;
    }

    /**
     * @return \DateTime | null
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param string $issueDate
     * @return SearchParametersFilter
     */
    public function setIssueDate(string $issueDate): self
    {
            $date = new \DateTime('now 0:0:0');
            $issueDate = sprintf('-%u day', $issueDate);
            $date->modify($issueDate);
            $this->issueDate = $date;
            return $this;
    }
}