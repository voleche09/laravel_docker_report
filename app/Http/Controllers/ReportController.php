<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function show()
    {
        $result = [];
        $saccos = DB::table('saccos')
            ->select('country', DB::raw('count(id) as count'))
            ->groupBy('country')
            ->orderBy('count', 'desc')
            ->get();
        $transactions = DB::table('saccos')
            ->join('individuals', 'saccos.id', '=', 'individuals.sacco_id')
            ->join('transactions', 'transactions.individual_id', '=', 'individuals.id')
            ->select('country', 'type', DB::raw('sum(amount) as amount'))
            ->groupBy('country', 'type')

            ->get();

        # Ignoring Transfer since its not in report
        $i = 0;
        foreach ($saccos as $sacco) {
            $result[$i]['id'] = $i + 1;
            $result[$i]['country'] = $sacco->country;
            $result[$i]['saccos'] = $sacco->count;
            $result[$i]['deposit'] = 0; #If sacco has no deposit set deposit to 0
            $result[$i]['withdrawal'] = 0; # if sacco has no withdraw set deposit to 0
            foreach ($transactions as $transaction) {
                if ($transaction->country == $sacco->country and $transaction->type == 'deposit') {
                    $result[$i]['deposit'] = $transaction->amount;
                }
                if ($transaction->country == $sacco->country and $transaction->type == 'withdrawal') {
                    $result[$i]['withdrawal'] = $transaction->amount;
                }
            }
            $result[$i]['gain'] = $result[$i]['deposit'] - $result[$i]['withdrawal'];
            $i++;
        }


        return   collect($result);
    }
}
