<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function bestSellers()
    {
        $bestSellers = Ticket::selectRaw('COUNT(animal_ticket.animal_id) as amountPlayed,SUM(animal_ticket.amount) as totalPlayed,daily_sort.time_sort,animals.name,SUM(tickets.pay_per_100) as pay_per_100, COUNT(tickets.id) amountTicket,animal_ticket.animal_id, ticket_sort.daily_sort_id')
            ->join('animal_ticket', 'animal_ticket.ticket_id', 'tickets.id')
            ->join('animals', 'animal_ticket.animal_id', 'animals.id')
            ->join('ticket_sort', 'ticket_sort.ticket_id', 'tickets.id')
            ->join('daily_sort', 'ticket_sort.daily_sort_id', 'daily_sort.id')
            ->groupBy('animal_ticket.animal_id', 'animals.name' ,'ticket_sort.daily_sort_id', 'daily_sort.time_sort')
            ->get();
        return view('admin.report.best-sellers', compact('bestSellers'));
    }
}
