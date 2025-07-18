<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;

class AgentController extends Controller
{
    // get all agents
    // public function getAll() {
    //     foreach (Agent::all() as $agent) {
    //         echo $agent->name;
    //     }
    // }

    // to get specific agents 
    // $agents = Agent::where('active', 1)
    //     ->orderBy('title')
    //     ->limit(10)
    //     ->get();

    // refresh(): reload data from db into the same object
    // $agent = Agent::where('title', 'Agent')->first();
    // $agent->title = 'Chatbot'; // this will change it locally
    // $agent->refresh(); // reset back to db value main one
    // echo $agent->title; // shows original db value

    // fresh(): get a new copy from db while the original stays the same
    // $agent = Agent::where('title', 'Agent')->first();
    // $freshAgent = $agent->fresh(); // new object with real db data

    
   
}
