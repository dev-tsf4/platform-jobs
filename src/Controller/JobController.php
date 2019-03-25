<?php

namespace App\Controller;

use App\Entity\Job;
use App\Search\SearchResultsProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Search\SearchParametersFilter;

class JobController extends AbstractController
{
    /**
     * @var SearchParametersFilter
     */
    private $parametersFilter;
    /**
     * @var SearchResultsProvider
     */
    private $resultsProvider;

    public function __construct(SearchParametersFilter $parametersFilter, SearchResultsProvider $resultsProvider)
    {
        $this->parametersFilter = $parametersFilter;
        $this->resultsProvider = $resultsProvider;
    }

    /**
     * @Route("/nos-jobs", name="job_index", methods={"GET"})
     */
    public function index(Request $request)
    {
        $search = $this->getSearch($request);

        $results = $this->resultsProvider->find($search);

        return $this->render('job/index.html.twig', [
            'search' => $search,
            'results' => $results
        ]);
    }

    /**
     * @Route("/nos-jobs/{slug}", methods={"GET"}, name="job_show")
     */
    public function show(Job $job)
    {
        return $this->render('job/show.html.twig', [
           'job' => $job
        ]);
    }

    private function getSearch(Request $request)
    {
        return $this->parametersFilter->handleRequest($request);
    }
}
