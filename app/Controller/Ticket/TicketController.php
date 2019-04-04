<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/7/19
 * Time: 8:16 PM
 */

namespace App\Controller\Ticket;


use App\Model\Client;
use App\Model\Department;
use App\Model\DepartmentUsers;
use App\Model\EscalationAction;
use App\Model\EscalationRule;
use App\Model\EscalationTicket;
use App\Model\Priority;
use App\Model\Ticket;
use App\Model\TicketDiscussion;
use App\Model\User;
use App\Utilies\DB;
use Carbon\Carbon;

class TicketController
{

    public function __construct()
    {
        guest();
    }

    public function index()
    {
        $tickets = Ticket::query();


        if (isset($_SESSION['user'])) {

            $user = User::where('id', $_SESSION['id'])->first();

            if ($user->type == 'admin') {

                $tickets = Ticket::all();


                return view('admin/tickets/index', compact('tickets'));
            }
            $ticketUsers = DepartmentUsers::where('user_id', $user->id)->get();

            $escalationTickets = EscalationTicket::where('user_id', $_SESSION['id'])->get();

            if ($ticketUsers->count()) {


                $departmentIds = $ticketUsers->pluck('department_id')->toArray();






                $tickets = Ticket::whereIn('department_id', $departmentIds);

            }

            if ($escalationTickets->count())
            {
                $tickets = $tickets->whereIn('id', $escalationTickets->pluck('id')->toArray());
            }

            $tickets = $tickets->get();


            return view('admin/tickets/index', compact('tickets'));

        }

        if (isset($_SESSION['client'])) {


            $tickets = Ticket::where('client_id', $_SESSION['id'])->get();

            return view('admin/tickets/index', compact('tickets'));
        }


    }

    public function create()
    {

        $ticket = new Ticket();

        if (isset($_GET['id'])) {

            $ticket = Ticket::where('id', $_GET['id'])->first();

        }

        $departments = Department::all();
        $priorities = Priority::all();


        return view('admin/tickets/create_edit', compact('ticket', 'departments', 'priorities'));

    }

    public function store()
    {

        if (isset($_POST['id'])) {


        } else {

            Ticket::create([
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
                'client_id' => $_SESSION['id'],
                'department_id' => $_POST['department_id'],
                'priority_id' => $_POST['priority_id'],
                'opened_at' => Carbon::now(),
            ]);
        }


        return header('Location:' . url('/tickets'));

    }

    public function find()
    {

        $ticket = Ticket::where('id', $_GET['id'])->first();


        if ($ticket) {
            return view('admin/tickets/reply', compact('ticket'));
        }
    }
    public function close()
    {

        $ticket = Ticket::where('id', $_GET['id'])->first();


        $ticket->update([
            'closed_at'  => Carbon::now(),
            'status'     => 'closed'
        ]);



        return header('Location:'.url('tickets/view?id='.$ticket->id));

    }
    public function open()
    {

        $ticket = Ticket::where('id', $_GET['id'])->first();

        $ticket->closed_at = null;
        $ticket->status = "opened";

        $ticket->created_at= Carbon::parse($ticket->opened_at);
        $ticket->save();




        return header('Location:'.url('tickets/view?id='.$ticket->id));

    }

    public function reply()
    {
        ini_set('max_execution_time','400000');

        try {

            $ticket = Ticket::where('id', $_POST['id'])->first();



            if (is_null($ticket->opened_at)) {

                $ticket->opened_at = Carbon::now();
                $ticket->save();


            }

            $discussion = TicketDiscussion::create([
                'message' => $_POST['message'],
                'ticket_id' => $ticket->id
            ]);


            if (isset($_SESSION['user'])) {


                $user = User::where('id', $_SESSION['id'])->first();




                $user->addDiscussion($discussion);

            }


            if (isset($_SESSION['client'])) {

                $client = Client::where('id', $_SESSION['id'])->first();

                $client->addDiscussion($discussion);

                $ticket->status = "customer reply";

                $ticket->save();


            }


            return header('Location:' . url('tickets/view?id=' . $ticket->id));
        } catch (\Exception $exception) {
            die($exception->getMessage());

        }

    }

    public function escalationRules()
    {
/*
        if ($_SESSION['type'] != 'admin'){

            throw new \Exception("Access denied");
        }*/


        $rules = EscalationRule::all();


        return view('admin/tickets/escalation/index', compact('rules'));


        
    }

    public function escalationNew()
    {




        $rule = new EscalationRule();



        if (isset($_GET['id'])){


            $rule = EscalationRule::where('id', $_GET['id'])->with('action')->first();
        }

        $departments = Department::all();

        $priorities = Priority::all();

        $users = User::all();

        return view('admin/tickets/escalation/create_edit', compact('rule','departments','users','priorities'));



    }

    public function escalationStore()
    {

        try {

            $request = $_POST;

            DB::beginTransaction();

            if (isset($_POST['id']) && ! empty($_POST['id'])) {

                $rule = EscalationRule::where('id', $_POST['id'])->with('action')->first();

                $rule->update([
                    'name' => $request['name'],
                    'priority_id' => $request['rule_priority_id'],
                    'department_id' => $request['rule_department_id'],
                    'status' => $request['rule_status'],
                ]);




                $action = EscalationAction::updateOrCreate([
                        'escalation_rule_id' => $rule->id,
                        'id' => $rule->action->id
                ], [
                    'escalation_rule_id' => $rule->id,
                    'priority_id' => $request['priority_id'],
                    'department_id' => $request['department_id'],
                    'status' => $request['status'],
                    'notify' => isset($request['notify']) ? true : false,
                    'user_id' => $request['user_id'],
                    'message' => $request['message']

                    ]);

                DB::commit();

                return header('Location: ' . url('tickets/escalation-rules'));

            }



            $rule = EscalationRule::create([
                'name' => $request['name'],
                'priority_id' => $request['rule_priority_id'],
                'department_id' => $request['rule_department_id'],
                'status' => $request['rule_status'],
            ]);



            EscalationAction::create([
                'escalation_rule_id' => $rule->id,
                'priority_id' => $request['priority_id'],
                'department_id' => $request['department_id'],
                'status' => $request['status'],
                'notify' => isset($request['notify']) ? true : false,
                'user_id' => $request['user_id'],
                'message' => $request['message']

            ]);

            DB::commit();

            return header('Location: ' . url('tickets/escalation-rules'));

        }
        catch (\Exception $exception) {



            DB::rollBack();
        }



    }

    public function escalationDelete()
    {


        $rules = EscalationRule::all();


        return view('admin/tickets/escalation/index', compact('rules'));



    }

}