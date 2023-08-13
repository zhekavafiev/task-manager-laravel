<?php

namespace App\Http\Controllers\Label;

use App\Http\Controllers\Controller;
use App\Model\Label;
use App\Services\Label\Exception\LabelsNotFoundException;
use App\Services\Label\LabelListService;
use Illuminate\Auth\Access\AuthorizationException;

class LabelsShowController extends Controller
{
    private LabelListService $labelListService;

    public function __construct(
        LabelListService $labelListService
    ) {
        $this->labelListService = $labelListService;
    }
    /**
     * @throws AuthorizationException
     * @throws LabelsNotFoundException
     */
    public function index()
    {
//        $this->authorize('actionWithLabels', Label::class);
        $labels = $this->labelListService->getList();
        return view('labels.index', compact('labels'));
    }
}
