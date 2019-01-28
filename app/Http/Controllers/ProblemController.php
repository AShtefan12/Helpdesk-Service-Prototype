<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index()
    {
        return view('problems');
    }

    public function search(Request $request)
    {
        $search = $request->get('q');

        return collect([
            ['id' => 'XK681', 'summary' => 'Faulty ink cartridges'],
            ['id' => 'XK690', 'summary' => 'Broken printer in the break room'],
        ])
            ->filter(function ($p) use ($search) {
                if (!$search) {
                    return true;
                }

                return preg_match('/' . $search . '/i', $p['id'])
                    || preg_match('/' . $search . '/i', $p['summary']);
            });
    }
}
