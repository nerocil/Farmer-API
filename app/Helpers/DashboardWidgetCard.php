<?php

namespace App\Helpers;

class DashboardWidgetCard
{
    private string $title;
    private string $subtitle;
    private int $subtotal;
    private float $percentage;

    public function __construct(
        string $title,
        string $subtitle,
        float    $subtotal,
        float  $percentage
    )
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->subtotal = $subtotal;
        $this->percentage = $percentage;
    }

    public function getCard(): array
    {
        return [
            "title" => $this->title,
            "subtitle" => $this->subtitle,
            "subtotal" => number_format($this->subtotal),
            "percentage" => number_format($this->percentage,1)."%",];
    }
}
