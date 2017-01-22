<?php
namespace App\Repositories;

use App\Models\Sample;

class SampleRepository
{
    protected $sample;

    function __construct()
    {
        $this->sample = new Sample();
    }

    public function getSampleDataBySampleId($id)
    {
        return $this->sample->find($id);
    }
}
