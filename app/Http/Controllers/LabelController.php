<?php

namespace App\Http\Controllers;

use App\Label;

class LabelController extends Controller
{
    public function index()
    {
        $this->authorize('actionWithLabels', Label::class);
        $labels = Label::get();
        return view('labels.index', compact('labels'));
    }

    public function destroy(Label $label)
    {
        $this->authorize('actionWithLabels', Label::class);
        $label->task()->detach();
        $label->delete();
        return redirect()->route('labels.index');
    }

}
