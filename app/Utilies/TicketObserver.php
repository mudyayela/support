<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/6/19
 * Time: 10:01 AM
 */

namespace App\Utilies;



use App\Model\EscalationTicket;
use App\Model\EscalationRule;
use App\Model\Ticket;
use Mailgun\Mailgun;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class TicketObserver
{


    public function created(Ticket $ticket)
    {

        $ticket->status = "opened";
        $ticket->save();

        $this->sendEmail($ticket);

    }

    public function updated(Ticket $ticket)
    {
        try{
            if (isset($ticket->getDirty()['closed_at']) && ! is_null($ticket->created_at)){

                $this->sendEmail($ticket , 'reopend tickect #'.$ticket->id);




            }

            $rules = EscalationRule::where([
                'priority_id'  => $ticket->priority->id,
                'department_id'  => $ticket->department->id,
                'status'  => $ticket->status

            ])->get();





            if (! $rules->count())
            {

            }



            foreach ($rules as $rule) {


                if ($ticket->priority->id == $rule->priority->id && $ticket->status == $rule->status && $ticket->department->id == $rule->department->id)
                {




                    $action = $rule->action;



                    if (! EscalationTicket::where([
                        'ticket_id' => $ticket->id,
                        'user_id'   => $action->user->id
                    ])->count()){

                        $escalate = EscalationTicket::create([
                            'ticket_id'  => $ticket->id,
                            'user_id'    => $action->user->id
                        ]);


                    }




                    if ($action->notify){

                        # First, instantiate the SDK with your API credentials
                        $mg = Mailgun::create(MAILGUN_SECRET);

                        $mg->messages()->send(MAILGUN_DOMAIN, [
                            'from'    => $ticket->client->name .'<'.$ticket->client->email.'>',
                            'to'      => 'Philip <'.MAIL_TO.'>',
                            'subject' => $ticket->subject,
                            'text'    =>  $ticket->message
                        ]);


                        $this->sendEmail($ticket , $action->message);

                    }

                }
            }

        }catch (\Exception $exception)
        {

            throw new \Exception($exception->getMessage());
        }

    }


    private function sendEmail(Ticket $ticket , $body = "")
    {

        try{

           $transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))
                ->setUsername(GMAIL_USERNAME)
                ->setPassword(GMAIL_PASSWORD)->setEncryption('tls');

            $mailer = new Swift_Mailer($transport);


            $message = (new Swift_Message($ticket->subject))
                ->setFrom(['philnjugunah@gmail.com' =>$ticket->client->name])
                ->setTo(['philnjugunah@gmail.com', 'philnjugunah@gmail.com' => 'Philip Njuguna'])
                ->setBody(isset($body) ? $body : $ticket->message);
              $mailer->send($message);




        }catch (\Exception $exception){


            return true;

        }
    }

}