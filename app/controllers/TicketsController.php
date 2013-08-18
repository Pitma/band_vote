<?php

	class TicketsController extends BaseController {

		 protected $layout = 'layouts.master';

    /**
     * Handles the emails for ordering tickets.
     */
    public function getTicketOrder()
    {
    	$this->layout->title = "Ticketbestellung";
        $this->layout->content = View::make('tickets.order');
    }

    public function postTicketOrder()
    {
    	//Secure CSRF
        $this->beforeFilter('csrf');

    	$input = array(
    	 	'name' => Input::get('name'),
    	 	'email' => Input::get('email'),
    	 	'ticketAmount' => Input::get('ticketAmount'),
    	 	'text' => Input::get('text'),
            'recaptcha_response_field' => Input::get('recaptcha_response_field'),
    	 	);

        $rules = array(
        	'name' => 'required',
            'email' => 'required|email',
            'ticketAmount' => 'required|numeric|between:1,20',
            'recaptcha_response_field' => 'required|recaptcha',
            );

        $messages = array(
		    "between"          => "Die Bestellung kann nur zwischen :min - :max liegen.",
		  );


        $validation = Validator::make($input, $rules, $messages);

         if($validation->fails())
        {
            Notification::error('Tickets wurden nicht bestellt!');
            //return dd($validation);
            return Redirect::to('tickets/order')
                        ->withinput()
                        ->witherrors($validation);
        }




    	Mail::pretend(false);

    	Mail::send('emails.tickets', $input, function($message)
    	{
    		$message->from('tickets@amalive.de', 'Amalive.de Ticket Bestellung');
    		$message->to(Input::get('email'),Input::get('name'));
            $message->bcc('juli-albrecht@t-online.de');
            $message->subject('Bestellung Tickets auf Amalive.de');
    	});


    	
    	Notification::success('Ticketbestellung wurde erfolgreich übermittelt!');
    	
        return Redirect::to('/');



    }

}