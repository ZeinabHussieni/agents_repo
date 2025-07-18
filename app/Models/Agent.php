<?php

namespace App\Models;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    /** @use HasFactory<\Database\Factories\AgentFactory> */
    use HasFactory;


    // custome table name (if different from 'agents')
    // protected $table = 'agents_table';

    // custome primary key name (if not 'id')
    // protected $primaryKey = 'custom_id';

    // to disabled auto-incrementing id 
    // public $incrementing = false;

    // if primary key is not an integer we have to set its type
    // protected $keyType = 'string';


    /*
     we can use ULIDs instead of auto-incrementing id
     they are 26-character strings that are ordered lexicographically
     which makes them better for indexing and database performance.
    */

    // use HasUlids;

    // $agent = Agent::create(['agency' => 'Example Agency']);
    //echo $agent->id;

    //relationship
    //if one to one HasOne 
    public function distination(): HasOne
    {
        return $this->hasOne(Distination::class);
    }

    //to get the distination that belongs to spicific agent
    // public function distination() :BelongsTo{
    //     return $this->belongsTo(Distination::class);
    // }


    
}
