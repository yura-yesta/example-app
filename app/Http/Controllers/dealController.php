<?php

namespace App\Http\Controllers;

use App\Models\deal;
use Illuminate\Http\Request;

class dealController extends Controller
{
    /**
     * Show home page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index()
    {
        $deals = (new \App\Models\deal)->getDeals();
        return view('home.deal', ['deal'=>$deals]);


    }

    /**
     * Creating a new deal and redirect.
     *
     * @return index()
     */
    public function create(Request $request)
    {
        $name = $request->input();
        $res = (new \App\Models\deal)->createDeals($name);
        return $this->index();
    }

    /**
     * Creating new task by id and redirect.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createTask(Request $request)
    {
        $id = $request->input();
        $res = (new \App\Models\deal)->createTask($id);
        return $this->index();
    }

    /**
     * Show form for create task.
     *
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
        return view('home.createDeal');
    }
    /**
     * Model for show task by id. Return view.
     */
    public function showTask(Request $request)
    {
        $id = $request->route('id');
        return view('home.taskcreate', ['deal'=>$id]);


        //$res = (new \App\Models\deal)->createTask($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Http\Response
     */
//    public function edit(deal $deal)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, deal $deal)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Http\Response
     */
//    public function destroy(deal $deal)
//    {
//        //
//    }
}
