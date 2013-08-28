<?php

class VotesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'layouts.master';

   public function __construct()
    {
        $this->beforeFilter('voteIsAllowed');

        $this->beforeFilter('csrf', array('on' => 'post'));

        //$this->afterFilter('log', array('only' =>
                           // array('fooAction', 'barAction')));
    }

    public function index()
    {   
        $this->layout->title   = 'Die Votingliste von AMALIVE.de';
        
        date_default_timezone_set('Europe/Berlin');
        $ip = Request::getClientIp();
        $count = Vote::whereRaw('ip_address = ? and created_at >= ?',array($ip,date('Y-m-d 00:00:00')))->count();
        $tomorrow = strtotime(date('Y-m-d 00:00:00', time()+86400));
        $now = time();
        $minutes =  round(abs($tomorrow - $now)/60)-120;
        $cookieValue = Cookie::get('IVoted');
        //return ' votes gucken! IP:'. $ip .'Count:'. $count. ' ZEIT '. $minutes. '/'. date('Y-m-d H:i:s',strtotime(date('Y-m-d 00:00:00', time()+86400))-1).'  ' .date('Y-m-d H:i:s',$now);
        
        $this->layout->content = View::make('votes.show')
            ->with('ip',$ip)
            ->with('count',$count)
            ->with('tomorrow',$tomorrow)
            ->with('now',$now)
            ->with('minutes',$minutes)
            ->with('cookie',$cookieValue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   $this->layout->title = 'Testeingabe Voting!';
        $this->layout->content = View::make('votes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //$this->beforeFilter('voteIsAllowed');
        //Secure CSRF
        //$this->beforeFilter('csrf');

         //Get Input
        $entry = array(
                'band_id' => Input::get('user_id'),
                //'recaptcha_response_field' => Input::get('recaptcha_response_field'),
                'captcha' => Input::get('captcha'),

            );
       
        $rules = array(
            'band_id' => 'required',
            //'recaptcha_response_field' => 'required|recaptcha',
            'captcha' => 'required|captcha',
            );
        $validation = Validator::make($entry,$rules);
        if(!$validation->fails())
        {

        $ip = Request::getClientIp();
        $tomorrow = strtotime(date('Y-m-d 00:00:00', time()+86400));
        $now = time();
        $minutes =  round(abs($tomorrow - $now)/60);
        $cookieCheck = Cookie::get('IVoted');
        $count = Vote::whereRaw('ip_address = ? and created_at >= ?',array($ip,date('Y-m-d 00:00:00',$now)))->count();
        
        //if ($count >= 0) 
        if ($count < 2) 
        {

            

                //if($cookieCheck >=0)
                if($cookieCheck < 2)
                {    
                    $vote = new Vote;
                    $user_id = Input::Get('user_id');
                    $vote->ip_address = $ip;
                    $vote->user_id = $user_id;
                    $vote->save();

                    //setup cookie
                    $cookie = Cookie::make('IVoted', $count+1, $minutes);
                    
                    Notification::success('Vote wurde erfolgreich gespeichert!');
                    return Redirect::back()->withCookie($cookie);

                    
                }
                else
                {
                    //Notification::error('Oh Oh! Keks verrät mir du hast schon '. $cookieCheck . ' mal gevoted!');
                    Notification::error('Sorry, aber du hast heute schon '.$count. ' votes abgegeben!');
                    return Redirect::back();
                }

            
        }
        else
        {   Notification::error('Sorry, aber du hast heute schon '.$count. ' votes abgegeben!');
            return Redirect::back();
        }
    }
            Notification::error('Vote ist leider fehlgeschalgen!');
            return Redirect::back();

    
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

}