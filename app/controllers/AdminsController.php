<?php

class AdminsController extends BaseController {

	protected $layout = 'layouts.master_admin';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
    {
        $this->beforeFilter('isAdmin');

        $this->beforeFilter('csrf', array('on' => 'post'));

        //$this->afterFilter('log', array('only' =>
                           // array('fooAction', 'barAction')));
    }
	public function index()
	{
		// $input = array(
		// 	'username' => 'Julian',
		// 	'password' => Hash::make('testAdmin')
		// 	);

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	 public function UserActivate()
        {
       

        $id = Input::get('band_id');

        $band = User::find($id);

        if($band)
        {
            $band->aktivkz = 1;

            $band->save();

            $input = array(
            		'email' => $band->email,
            		'name' => $band->name,
            		'firstname' => $band->firstname
            		);

            
            Mail::pretend(false);

		    	Mail::send('emails.freischaltung',$input, function($message) use ($input)
		    	{
		    		$message->from('info@amalive.de', 'Amalive.de');
		    		$message->to($input['email'],$input['name']);
		    		//$message->to('patrickmainka@gmail.com',$input['name']);
		            //$message->bcc('juli-albrecht@t-online.de');
		            $message->subject('Freischaltung deiner Band auf Amalive.de');
		    	});
		    Notification::success('Email wurde an '.$band->email.' versendet!');

            return Redirect::to('admin/check');
        }

        Notification::error('Band konnte nicht aktiviert werden!');
            return Redirect::to('admin/check');
        }

    public function UserCheck()
        {
        	
            $bands = User::get_bands_inactive();

            $this->layout->title = 'Bandfreischaltung';

            $this->layout->content = View::make('users.check')->with('bands',$bands);
        	
        }
    public function VotesDetails()
    {
    	
        	$bands = User::get_bands_active();

            $this->layout->title = 'Voting Details';

            $this->layout->content = View::make('admin.vote_details')->with('bands',$bands);


    }
}