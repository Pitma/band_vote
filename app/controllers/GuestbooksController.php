<?php

class GuestbooksController extends BaseController {

     public function __construct()
    {
       

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return View::make('guestbooks.index')
        ->with('guestbooks', Guestbook::all());
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
        //Secure CSRF
        $this->beforeFilter('csrf');
        
        //Get Input
        $entry = array(
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'message' => Input::get('message'),
            );

        $validation = Validator::make($entry, Guestbook::$rules);
        if($validation->fails())
        {
            return Redirect::to('guestbooks')
                        ->withinput()
                        ->witherrors($validation);
            
        }

        //Save in Database
        Guestbook::create($entry);

        Notification::success('Beitrag erfolgreich gespeichert!');
        //Redirect to Overview
        return Redirect::to('guestbooks');



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
        $entry = Guestbook::find($id);

        $entry->delete();
        Notification::success('Beitrag erfolgreich gelöscht');
        return Redirect::to('guestbooks');
    }

}