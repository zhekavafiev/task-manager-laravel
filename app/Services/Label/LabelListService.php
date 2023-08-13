<?php

namespace App\Services\Label;

use App\Model\Label;
use App\Services\Label\DTO\LabelResponse;
use App\Services\Label\Exception\LabelsNotFoundException;

final class LabelListService
{
    public function __construct()
    {
    }

    /**
     * @throws LabelsNotFoundException
     */
    public function getList()
    {
        $labels = Label::get();
        if ($labels->isEmpty()) {
            throw new LabelsNotFoundException();
        }

        return $labels->map(function (Label $label) {
            return (new LabelResponse(
                $label->id,
                $label->text,
                $label->text_color,
                $label->color
            ))->jsonSerialize();
        });
    }
}
