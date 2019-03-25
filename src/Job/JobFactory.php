<?php

namespace App\Job;

use App\Entity\Job;

class JobFactory
{
    public function createFromArray(array $data): Job
    {
        $job = new Job();
        $job->setTitle($data['title']);
        $job->setIdAdvertisement($data['idAdvertisement']);
        $job->setContract($data['contract']);
        $job->setLocation($data['location']);
        $job->setDescription($data['description']);
        $job->setProfile($data['profile']);
        $job->setPublished($data['published'] ?? true);
        $job->setPublishedAt($data['publishedAt'] ?? new \DateTime());

        return $job;
    }
}