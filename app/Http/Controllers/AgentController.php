<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;

class AgentController extends Controller
{
    // get all agents
    public function getAll() {
        foreach (Agent::all() as $agent) {
            echo $agent->name;
        }
    }

    // to get specific agents 
    public function getSpecificAgents() {
        $agents = Agent::where('active', 1)
            ->orderBy('title')
            ->limit(10)
            ->get();

        return $agents;
    }

    // refresh(): reload data from db into the same object
    public function Refresh() {
        $agent = Agent::where('title', 'Agent')->first();
        $agent->title = 'Chatbot'; // local change
        $agent->refresh(); // revert
        return $agent->title;
    }

    // fresh(): get a new copy from db while the original stays the same
    public function Fresh() {
        $agent = Agent::where('title', 'Agent')->first();
        $freshAgent = $agent->fresh(); // new object
        return $freshAgent;
    }


    // reject(): remove items that no longer match the requirement 
   public function Reject() {
        $agents = Agent::where('model_type', 'Chatboot')->get();

        $filtered = $agents->reject(function (Agent $agent) {
            return $agent->cancelled;
        });

        return $filtered->values(); 
    }

   // chunk(): break down big data into small chunks and loop through each
   // chunkById(): chunk based on ID so it doesn't mess with data order during updates
    public function demoChunkById() {
        Agent::where('is_active', true)
            ->chunkById(200, function (Collection $agents) {
                $agents->each->update(['is_active' => false]);
            }, column: 'id');

        return "Updated in chunks!";
    }


   // lazy(): loads row by row behind the scenes in chunks but we don’t see the batch
   public function demoLazy() {
        foreach (Agent::where('is_active', true)->lazy() as $agent) {
            $agent->update(['is_active' => false]);
        }

        return "Updated lazily!";
    }


   // lazyById(): safer for updating when filtering by a column that’s being updated
   public function demoLazyById() {
        Agent::where('is_active', true)
            ->lazyById(200)
            ->each(function ($agent) {
                $agent->update(['is_active' => false]);
            });

        return "Updated using lazyById!";
    }






    
   
}
