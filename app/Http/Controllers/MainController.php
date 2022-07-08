<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\App;
use App\Models\Criteria;
use App\Models\Score;

class MainController extends Controller
{
    public function index()
    {
        $app = App::first();

        return view('dashboard.index', compact('app'));
    }

    public function apps()
    {
        $apps = App::all();

        return view('dashboard.apps', compact('apps'));
    }

    public function app($id)
    {
        $app = App::with('alternatives', 'criterias', 'results', 'alternatives.scores')->where('id', $id)->first();

        return view('dashboard.pages.app.index', compact('app'));
    }

    public function deleteApp($id)
    {
        $app = App::findOrFail($id);

        $app->delete();

        return redirect('/');
    }

    public function alternatives($id)
    {
        $app = App::with('alternatives', 'criterias', 'criterias.scores')->where('id', $id)->first();

        return view('dashboard.pages.alternatives.index', compact('app'));
    }

    public function criterias($id)
    {
        $app = App::with('criterias')->where('id', $id)->first();

        return view('dashboard.pages.criterias.index', compact('app'));
    }

    public function evaluation($id)
    {
        $app = App::with('alternatives', 'criterias', 'results', 'alternatives.scores')->where('id', $id)->first();

        if(count($app->alternatives) > 0) {

            $criterias = Criteria::with('scores')->where('app_id', $id)->get();

            $total_weight = $criterias->sum('weight');

            $alternatives = Alternative::with('scores')->where('app_id', $id)->get();

            $scores = Score::all();

            return view('dashboard.pages.evaluation.index', compact('app', 'scores', 'criterias', 'total_weight', 'alternatives'));
        }

        return view('dashboard.pages.alternatives.index', compact('app'));
    }
}
