<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function bestSellers(Request $request)
    {
        $now = new \DateTime();

        if (! $request->has('date')) {
            $date = $now;
        } else {

            $date = new \DateTime(is_array($request->date) ? $request->date['date'] : $request->date);

            if ($date > $now) {
                $date = $now;
            }
        }
        $bestSellers = Ticket::selectRaw('animals.number,sorts.description,COUNT(animal_ticket.animal_id) as amountPlayed,SUM(animal_ticket.amount) as totalPlayed,daily_sort.time_sort,animals.name,SUM(tickets.pay_per_100) as pay_per_100, COUNT(tickets.id) amountTicket,animal_ticket.animal_id, ticket_sort.daily_sort_id')
            ->join('animal_ticket', 'animal_ticket.ticket_id', 'tickets.id')
            ->join('animals', 'animal_ticket.animal_id', 'animals.id')
            ->join('ticket_sort', 'ticket_sort.ticket_id', 'tickets.id')
            ->join('daily_sort', 'ticket_sort.daily_sort_id', 'daily_sort.id')
            ->join('sorts', 'daily_sort.sort_id', 'sorts.id')
            ->groupBy('animal_ticket.animal_id','sorts.description','animals.name','animals.number','ticket_sort.daily_sort_id', 'daily_sort.time_sort')
            ->whereDate('tickets.created_at', $date)
            ->get();
        return view('admin.report.best-sellers', compact('bestSellers', 'date', 'now'));
    }
}
