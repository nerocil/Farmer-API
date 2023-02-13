<?php

namespace App\Helpers;

class ChartsForLineAndBar
{

    private string $title;
    private bool $isLineChart = true;


    public function __construct(string $title)
    {
        $this->title = $title;
    }

    function lineChart(array $data): array
    {
        $this->isLineChart = true;
        return $this->chart($data);
    }

    function barChart(array $data): array
    {
        $this->isLineChart = false;
        return $this->chart($data);
    }

    private function chart(array $data): array
    {
        return [
            "title" => $this->title,
            "type" => $this->isLineChart ? "Line":"Bar",
            "chartData" => [
                ...$data
            ]
        ];
    }


}
