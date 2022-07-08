<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\App;
use App\Models\Criteria;
use App\Models\Score;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function makeApp(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $app = App::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => 'exist'
        ]);

        return redirect()->route('app', $app->id);
    }

    public function editApp(Request $req, $id)
    {
        $data = $req->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $app = App::findOrFail($id);

        $app->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        return redirect()->back()->with('success', 'Editing App Successfully!');
    }

    public function addCriteria(Request $req, $id)
    {
        $data = $req->validate([
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
            'weight' => 'required',
        ]);

        $crt = Criteria::create([
            'app_id' => $id,
            'code' => $data['code'],
            'name' => $data['name'],
            'type' => $data['type'],
            'weight' => $data['weight']
        ]);

        $alt = Alternative::where('app_id', $id)->get();

        foreach ($alt as $a) {
            Score::create([
                'criteria_id' => $crt->id,
                'alternative_id' => $a->id,
                'score' => 0
            ]);
        }

        return redirect()->route('criterias', $id)->with('success', 'Creating Criteria Successfully!');
    }

    public function editCriteria(Request $req, $id)
    {
        $data = $req->validate([
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
            'weight' => 'required',
        ]);

        $crt = Criteria::findOrFail($id);

        $crt->update([
            'code' => $data['code'],
            'name' => $data['name'],
            'type' => $data['type'],
            'weight' => $data['weight']
        ]);

        return redirect()->back()->with('success', 'Editing Criteria Successfully!');
    }

    public function deleteCriteria($id)
    {
        $crt = Criteria::findOrFail($id);

        $crt->delete();

        return redirect()->back()->with('success', 'Delete Criteria Successfully!');
    }

    public function addAlternative(Request $req, $id)
    {

        $data = $req->validate([
            'name' => 'required',
            'scores.*' => 'required',
        ]);

        $alt = Alternative::create([
            'app_id' => $id,
            'name' => $data['name']
        ]);

        foreach($data['scores'] as $score) {
            foreach($score as $key => $value) {
                Score::Create([
                    'alternative_id' => $alt->id,
                    'criteria_id' => $key,
                    'score' => $value
                ]);
            }
        }

        //evaluation


        return redirect()->route('alternatives', $id)->with('success', 'Creating Alternative Successfully!');
    }

    public function editAlternative(Request $req, $id)
    {

        $data = $req->validate([
            'name' => 'required',
            'scores.*' => 'required',
        ]);

        Alternative::findOrFail($id)->update([
            'name' => $data['name']
        ]);

        foreach($data['scores'] as $score) {
            foreach($score as $key => $value) {
                Score::where('alternative_id', $id)->where('criteria_id', $key)->update([
                    'score' => $value
                ]);
            }
        }

        return redirect()->back()->with('success', 'Editing Alternative Successfully!');
    }

    public function deleteAlternative($id)
    {
        $alt = Alternative::findOrFail($id);

        $alt->delete();

        return redirect()->back()->with('success', 'Delete Criteria Successfully!');
    }
}
