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

   public function allCoaches(Request $request)
{
    // Get filters from the request
    $experienceLevel = $request->input('level_of_experience', '');
    $rateRange = $request->input('rate_range', '');

    // Retrieve coaches based on the selected level_of_experience and rate range
    $coaches = Coach::with('user')
        ->when($experienceLevel, function ($query, $experienceLevel) {
            $query->whereHas('user', function ($subQuery) use ($experienceLevel) {
                $subQuery->where('level_of_experience', $experienceLevel);
            });
        })
        ->when($rateRange, function ($query) use ($rateRange) {
            if ($rateRange === '0-250') {
                $query->whereBetween('rate', [0, 250]);
            } elseif ($rateRange === '250-500') {
                $query->whereBetween('rate', [250, 500]);
            } elseif ($rateRange === '500-700') {
                $query->whereBetween('rate', [500, 700]);
            } elseif ($rateRange === '700+') {
                $query->where('rate', '>=', 700);
            }
        })
        ->get();

    // Define the experience levels and rate ranges for filtering
    $experienceLevels = ['District', 'National', 'International'];
    $rateRanges = [
        '0-250' => '0 - 250 LKR',
        '250-500' => '250 - 500 LKR',
        '500-700' => '500 - 700 LKR',
        '700+' => '700 or Above LKR'
    ];

    // Pass the coaches and the filter options to the view
    return view('pages.coach', [
        'coaches' => $coaches,
        'experienceLevels' => $experienceLevels,
        'rateRanges' => $rateRanges
    ]);
}

// In SportsController.php

public function allGrounds(Request $request)
{
    // Get filters from the request
    $rateRange = $request->input('rate_range', '');
    $capacityRange = $request->input('capacity_range', '');

    // Retrieve grounds based on the selected rate range and capacity range
    $grounds = Grounds::with('user')
        ->when($rateRange, function ($query) use ($rateRange) {
            if ($rateRange === '0-1000') {
                $query->whereBetween('rate', [0, 1000]);
            } elseif ($rateRange === '1001-2000') {
                $query->whereBetween('rate', [1001, 2000]);
            } elseif ($rateRange === '2001-3000') {
                $query->whereBetween('rate', [2001, 3000]);
            } elseif ($rateRange === '3001+') {
                $query->where('rate', '>', 3000);
            }
        })
        ->when($capacityRange, function ($query) use ($capacityRange) {
            if ($capacityRange === '0-500') {
                $query->whereBetween('capacity', [0, 500]);
            } elseif ($capacityRange === '501-1000') {
                $query->whereBetween('capacity', [501, 1000]);
            } elseif ($capacityRange === '1001-1500') {
                $query->whereBetween('capacity', [1001, 1500]);
            } elseif ($capacityRange === '1501-2000') {
                $query->whereBetween('capacity', [1501, 2000]);
            } elseif ($capacityRange === '2001+') {
                $query->where('capacity', '>', 2000);
            }
        })
        ->get();

    // Define the rate ranges and capacity ranges for filtering
    $rateRanges = [
        '0-1000' => '0 - 1000 LKR',
        '1001-2000' => '1001 - 2000 LKR',
        '2001-3000' => '2001 - 3000 LKR',
        '3001+' => 'More than 3000 LKR',
    ];

    $capacityRanges = [
        '0-500' => '0 - 500',
        '501-1000' => '501 - 1000',
        '1001-1500' => '1001 - 1500',
        '1501-2000' => '1501 - 2000',
        '2001+' => 'More than 2000',
    ];

    // Pass the grounds and the filter options to the view
    return view('pages.grounds', [
        'grounds' => $grounds,
        'rateRanges' => $rateRanges,
        'capacityRanges' => $capacityRanges
    ]);
}








}
