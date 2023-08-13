<?php

namespace App\Http\Controllers\Label;

use App\Http\Controllers\Controller;
use App\Model\Label;
use Illuminate\Auth\Access\AuthorizationException;

class LabelDestroyController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('actionWithLabels', Label::class);
        $labels = Label::get();
        return view('labels.index', compact('labels'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Label $label)
    {
        $this->authorize('actionWithLabels', Label::class);
        $label->task()->detach();
        $label->delete();
        return redirect()->route('labels.index');
    }
}
