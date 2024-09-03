<?php

namespace App\Http\Controllers;

use App\Models\coach;
use App\Models\grounds;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    // Common method to get coaches and grounds for a sport
    private function getCoachesAndGrounds($sport)
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) use ($sport) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', $sport);
            })
            ->get();

        $grounds = Grounds::whereHas('user', function ($query) use ($sport) {
            $query->where('usertype', 'Ground Owner')
                  ->whereJsonContains('available_sports', $sport);
        })->get();

        return compact('coaches', 'grounds');
    }


    // Function to get basketball coaches and grounds/
    public function basketball()
    {
        $data = $this->getCoachesAndGrounds('Basketball');
        return view('pages.basketball', $data);
    }

    // Function to get tennis coaches and grounds/
    public function tennis()
    {
        $data = $this->getCoachesAndGrounds('Tennis');
        return view('pages.tennis', $data);
    }

    // Function to get swimming coaches and grounds/
    public function swimming()
    {
        $data = $this->getCoachesAndGrounds('Swimming');
        return view('pages.swimming', $data);
    }

    // Function to get cricket coaches and grounds/
    public function cricket()
    {
        $data = $this->getCoachesAndGrounds('Cricket');
        return view('pages.cricket', $data);
    }

    // Function to get football coaches and grounds/
    public function football()
    {
        $data = $this->getCoachesAndGrounds('Football');
        return view('pages.football', $data);
    }

    // Function to get rugby coaches and grounds/
    public function rugby()
    {
        $data = $this->getCoachesAndGrounds('Rugby');
        return view('pages.rugby', $data);
    }

    // Function to get boxing coaches and grounds/
    public function boxing()
    {
        $data = $this->getCoachesAndGrounds('Boxing');
        return view('pages.boxing', $data);
    }

    // Function to get hockey coaches and grounds/
    public function hockey()
    {
        $data = $this->getCoachesAndGrounds('Hockey');
        return view('pages.hockey', $data);
    }

    // Function to get volleyball coaches and grounds/
    public function volleyball()
    {
        $data = $this->getCoachesAndGrounds('Volleyball');
        return view('pages.volleyball', $data);
    }

    // Function to get badminton coaches and grounds/
    public function badminton()
    {
        $data = $this->getCoachesAndGrounds('Badminton');
        return view('pages.badminton', $data);
    }

    // Function to get baseball coaches and grounds/
    public function baseball()
    {
        $data = $this->getCoachesAndGrounds('Baseball');
        return view('pages.baseball', $data);
    }

    // Function to get table tennis coaches and grounds/
    public function tabletennis()
    {
        $data = $this->getCoachesAndGrounds('Table Tennis');
        return view('pages.tabletennis', $data);
    }

    // Function to get athletics coaches and grounds/
    public function athletics()
    {
        $data = $this->getCoachesAndGrounds('Athletics');
        return view('pages.athletics', $data);
    }

    // Function to get karate coaches and grounds/
    public function karate()
    {
        $data = $this->getCoachesAndGrounds('Karate');
        return view('pages.karate', $data);
    }

    // Function to get chess coaches and grounds/
    public function chess()
    {
        $data = $this->getCoachesAndGrounds('Chess');
        return view('pages.chess', $data);
    }

   // Show specific coach details
   public function showCoach($id)
   {
       $coach = Coach::with('user')->findOrFail($id); // Fetch coach details along with the associated user details
       return view('pages.coachdescrip', compact('coach')); // Return the view with coach details
   }

   // Show specific ground details
   public function showGround($id)
   {
       $ground = Grounds::with('user')->findOrFail($id); // Fetch ground details along with the associated user details
       return view('pages.grounddescrip', compact('ground')); // Return the view with ground details
   }

}
