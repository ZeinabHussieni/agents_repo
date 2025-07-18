<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Destination;

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
    public function ChunkById() {
        Agent::where('is_active', true)
            ->chunkById(200, function (Collection $agents) {
                $agents->each->update(['is_active' => false]);
            }, column: 'id');

        return "Updated in chunks!";
    }


   // lazy(): loads row by row behind the scenes in chunks but we don’t see the batch
   public function Lazy() {
        foreach (Agent::where('is_active', true)->lazy() as $agent) {
            $agent->update(['is_active' => false]);
        }

        return "Updated lazily!";
    }


   // lazyById(): safer for updating when filtering by a column that’s being updated
   public function LazyById() {
        Agent::where('is_active', true)
            ->lazyById(200)
            ->each(function ($agent) {
                $agent->update(['is_active' => false]);
            });

        return "Updated using lazyById!";
    }

    // addSelect lets us add a new column to the query result
    public static function getWithLastAgent()
    {
        return Destination::addSelect([
           'last_agent' => Agent::select('name')
            ->whereColumn('destination_id', 'destinations.id')
            ->limit(1)
       ])->get();
   }

   //updateOrcreate
   function UpdateOrCreate(){
    $agent = Agent::updateOrCreate(
        ['name'=>'Chatbot','is_active'=>0]
    );
   }

   //we can update records based on specific conditions
   function UpdateActiveAgent(){
    Agent::where('is_active', 1)
    ->where('destination', 'Lebanon')
    ->update(['is_active'=>0]);
   }

   //upsert lets us search by specific columns update if found or create if not
   function upsert(){
      Agent::upsert([
         ['distination' => 'lebanon', 'is_action' => 0],
        ], uniqueBy: ['destination'], update: ['is_action']);
    }







   










    
   
}
