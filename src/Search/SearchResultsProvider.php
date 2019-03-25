<?php

namespace App\Search;

use App\Repository\JobRepository;

class SearchResultsProvider
{
    /**
     * @var JobRepository
     */
    private $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function find(SearchParametersFilter $search)
    {
        return $this->jobRepository->searchJobsByFilter($search);
    }
}