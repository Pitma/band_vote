<?php

class UsersController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'layouts.master';
    

    public function __contruct()
    {
         $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function index($order_ = 'best')
    {

        //Overview all Bands
        $this->layout->title = 'Übersicht alle Bands!';


        $order = (!is_null($order_) ? $order_ : 'asc');
        if($order === 'best'){
            $bands = User::bandsByVote();
        }
        else
        { 
            $bands = User::where('aktivkz','=','1'); 
            //'asc' is the default sort order.
            $bands = $bands->orderby('name',$order); 
            $bands = $bands->paginate(30);
        
        }

        $voteCount = Vote::all()->count();

        $this->layout->content = View::make('users.index')
            ->with('bands', $bands)
            ->with('order', $order)
            ->with('voteIsAllowed',Vote::$voteIsAllowed)
            ->with('voteCount', $voteCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->title = 'Band Registrierung!';
        $this->layout->content = View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        

        //Get Input
        $entry = array(
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'description' => Input::get('description'),
                'password' => Input::get('password'),
                'genre' => Input::get('genre'),
                'origin' => Input::get('origin'),
                'picture' => Input::file('picture'),
                'youtube' => Input::get('youtube'),
                'music' => Input::file('musica'),
                'firstname' => Input::get('firstname'),
                'lastname' => Input::get('lastname'),
                'address' => Input::get('address'),
                'city' => Input::get('city'),
                'telefon' => Input::get('telefon'),
                'agb' => Input::get('agb'),
                //'recaptcha_response_field' => Input::get('recaptcha_response_field'),
                'captcha' => Input::get('captcha'),

            );
        $picture_file = Input::file('picture');
        $music_file   = Input::file('musica');
        

        $validation = Validator::make($entry, User::$rules);
        if($validation->fails())
        {
            Notification::error('Band konnte nicht registriert werden!');
            //return dd($validation);
            return Redirect::to('users/create')
                        ->withinput()
                        ->witherrors($validation);
                        
            
        }

        /*Upload Picture*/
        if ($picture_file)
        {
        
        $pic_destinationPath = 'uploads/pics/'.str_random(10);
        $pic_filename = $picture_file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension(); 
        $pic_upload_success = Input::file('picture')->move($pic_destinationPath, $pic_filename);

            if ($pic_upload_success) {
                 $entry['picture'] = $pic_destinationPath.'/'.$pic_filename;
            }else{

              Notification::error('Bild konnte nicht gespeichert werden!');
                return Redirect::to('users/create')
                        ->withinput();
            }
        }
        /*Upload Musicfile*/
        if ($music_file)
        {
        
        $music_destinationPath = 'uploads/music/'.str_random(10);
        $music_filename = $music_file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension(); 
        $music_upload_success = Input::file('musica')->move($music_destinationPath, $music_filename);

            if ($music_upload_success) {
                $entry['music'] = $music_destinationPath.'/'.$music_filename;
            }else{

               Notification::error('Musikdatei konnte nicht gespeichert werden!');
                return Redirect::to('users/create')
                        ->withinput();
            } 
        }

        /*Youtube Link*/
         if ($entry['youtube'])
         {
            $teile = explode("=", $entry['youtube']);
         }
         else
         {

            $teile[1] = '';
         }
        

        $user = new User;

        $user->name = $entry['name'];
        $user->email = $entry['email'];
        $user->description = $entry['description'];
        $user->password = Hash::make($entry['password']);
        $user->genre = $entry['genre'];
        $user->origin = $entry['origin'];
        $user->picture = $entry['picture'];
        $user->youtube = $teile[1];
        $user->music = $entry['music'];
        $user->firstname = $entry['firstname'];
        $user->lastname = $entry['lastname'];
        $user->address = $entry['address'];
        $user->city = $entry['city'];
        $user->telefon = $entry['telefon'];
        $user->agb = $entry['agb'];

        //Save in Database
        $user->save();

        //Email an User
        Mail::send('emails.welcome', $entry, function($message) use ($entry)
        {
            $message->from('registrierung@amalive.de', 'Amalive.de');
            //$message->to('patrickmainka@gmail.com',Input::get('name'));
            $message->to(Input::get('email'),Input::get('name'));
            $message->bcc('juli-albrecht@t-online.de');
            $message->subject('Neues Bandprofil bei amalive.de');
        });


        Notification::success('Band wurde erfolgreich registriert! Sie erhalten in Kürze eine Bestätigungsmail!');
        //Redirect to Overview
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $band = User::find($id);
        $this->layout->title = 'Profil von '. $band->name;
        $this->layout->content = View::make('users.show')
            ->with('band',$band)
            ->with('voteIsAllowed',Vote::$voteIsAllowed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        if (Auth::check() AND Auth::User()->id == $id)
            {
                $band = User::find($id);
                $this->layout->title = 'Band bearbeiten';
                $this->layout->content = View::make('users.edit')
                    ->with('band',$band);
            }else
            {
                Notification::error('Du hast leider keine Berechtigung für diese Funktion! Bitte logge dich ein!');
                return Redirect::to('login');
            }
     

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
        
    }

    public function login()
    {
        $this->layout->title = 'Band Login';
        $this->layout->content = View::make('users.login');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

     public function login_try()
    {
        
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
                if(Auth::User()->admin == 1)
                {
                    return Redirect::route('admin');
                }

                return Redirect::to('users/'.Auth::User()->id.'/edit');
        }
            else
            {

                Notification::error('Login leider fehlerhaft!');
                $this->layout->title = 'Band Login';
                $this->layout->content = View::make('users.login');
            }

    }

    public function edit_band($id)
    {
        if(Auth::check())
        {

         
         $input = Input::all();

         $rules = array('name' => 'required|unique:users,name,'.$id,
                        'email' => 'required|unique:users,email,'.$id,
                        'password' => 'min:5',
                        'description' => 'required|min:10',
                        'genre' => 'required|min:2',
                        'origin' => 'required|min:2',);

         $validation = Validator::make($input, $rules);

         if($validation->fails())
        {
            Notification::error('Daten konnten nicht gespeichert werden!');
            //return dd($validation);
            return Redirect::to('users/'.Auth::User()->id.'/edit')
                        ->withinput()
                        ->witherrors($validation);
                        
            
        }

        $band = User::find($id);    
        

        if($input['password'] != ''){$band->password = Hash::make($input['password']);}
        $band->name = $input['name'];
        $band->email = $input['email'];
        $band->description = $input['description'];
        $band->genre = $input['genre'];
        $band->origin = $input['origin'];

        $band->update();
        Notification::success('Daten gespeichert!');
        return Redirect::to('users/'.Auth::User()->id.'/edit');

        }

        return Redirect::to_route('/');
    }

     public function edit_media($id)
    {
        if(Auth::check())
        {

         
         $input = Input::all();
         $picture_file = Input::file('picture');
         $music_file   = Input::file('musica');

         $rules = array(
                        'picture' => 'image|max:2000',  
                        'music' => 'audio|max:8000',
                        'youtube' => 'url',
            );

         $validation = Validator::make($input, $rules);

         if($validation->fails())
        {
            Notification::error('Daten konnten nicht gespeichert werden!');
            //return dd($validation);
            return Redirect::to('users/'.Auth::User()->id.'/edit')
                        ->withinput()
                        ->witherrors($validation);     
        }

        $band = User::find($id);    
        
         /*Upload Picture*/
        if ($picture_file)
        {

        $pic_destinationPath = 'uploads/pics/';
        $pic_filename = str_random(13).'.'.$picture_file->getClientOriginalExtension();
        //$extension =$file->getClientOriginalExtension(); 
        $pic_upload_success = Input::file('picture')->move($pic_destinationPath, $pic_filename);

            if ($pic_upload_success) {
                 $input['picture'] = $pic_destinationPath.'/'.$pic_filename;
                if (file_exists($band->picture)){unlink($band->picture);}
            }else{

              Notification::error('Bild konnte nicht gespeichert werden!');
                return Redirect::to('users/create')
                        ->withinput();
            }
        }
        /*Upload Musicfile*/
        if ($music_file)
        {
        
        $music_destinationPath = 'uploads/music/';
        $music_filename = str_random(13).'.'.$music_file->getClientOriginalExtension();
        //$extension =$file->getClientOriginalExtension(); 
        $music_upload_success = Input::file('musica')->move($music_destinationPath, $music_filename);

            if ($music_upload_success) {
                $input['musica'] = $music_destinationPath.'/'.$music_filename;
                if (file_exists($band->music)){unlink($band->music);}
            }else{

               Notification::error('Musikdatei konnte nicht gespeichert werden!');
                return Redirect::to('users/create')
                        ->withinput();
            } 
        }

        /*Youtube Link*/
         if ($input['youtube'])
         {
            $teile = explode("=", $input['youtube']);
         }  

        if($input['picture'] != ''){$band->picture =  $input['picture'];}
        
        if($input['musica'] != ''){$band->music = $input['musica'];}
        
        if($input['youtube'] != ''){$band->youtube =  preg_replace('/&.+/', '', $teile[1]);}

        $band->update();
        Notification::success('Daten gespeichert!');
        return Redirect::to('users/'.Auth::User()->id.'/edit');

        }

        return Redirect::to_route('/');
    }
    
     public function edit_personal($id)
    {
        if(Auth::check())
        {   
         $input = Input::all();
         $rules = array(
                            'firstname' => 'required',
                            'lastname' => 'required',
                            'address' => 'required',
                            'city' => 'required',
                            'telefon' => 'required',
            );

         $validation = Validator::make($input, $rules);

         if($validation->fails())
        {
            Notification::error('Daten konnten nicht gespeichert werden!');
            //return dd($validation);
            return Redirect::to('users/'.Auth::User()->id.'/edit')
                        ->withinput()
                        ->witherrors($validation);   
        }

        $band = User::find($id);        
        $band->firstname = $input['firstname'];
        $band->lastname = $input['lastname'];
        $band->address = $input['address'];
        $band->city = $input['city'];
        $band->telefon = $input['telefon'];
        $band->update();
        Notification::success('Daten gespeichert!');
        return Redirect::to('users/'.Auth::User()->id.'/edit');

        }

        return Redirect::to_route('/');
        }

        
    public function forgot()
    {

        $this->layout->title = 'Passwort vergessen';
        $this->layout->content = View::make('users/forgot');
    }
       
}

    

