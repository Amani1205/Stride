<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    // Function to get soccer coaches
    public function soccer()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Soccer');
            })
            ->get();

        return view('pages.soccer', ['coaches' => $coaches]);
    }

    // Function to get basketball coaches
    public function basketball()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Basketball');
            })
            ->get();

        return view('pages.basketball', ['coaches' => $coaches]);
    }

    // Function to get tennis coaches
    public function tennis()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Tennis');
            })
            ->get();

        return view('pages.tennis', ['coaches' => $coaches]);
    }

    // Function to get swimming coaches
    public function swimming()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Swimming');
            })
            ->get();

        return view('pages.swimming', ['coaches' => $coaches]);
    }

    // Function to get cricket coaches
    public function cricket()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Cricket');
            })
            ->get();

        return view('pages.cricket', ['coaches' => $coaches]);
    }

    // Function to get football coaches
    public function football()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Football');
            })
            ->get();

        return view('pages.football', ['coaches' => $coaches]);
    }

    // Function to get rugby coaches
    public function rugby()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Rugby');
            })
            ->get();

        return view('pages.rugby', ['coaches' => $coaches]);
    }

    // Function to get boxing coaches
    public function boxing()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Boxing');
            })
            ->get();

        return view('pages.boxing', ['coaches' => $coaches]);
    }

    // Function to get hockey coaches
    public function hockey()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Hockey');
            })
            ->get();

        return view('pages.hockey', ['coaches' => $coaches]);
    }

    // Function to get volleyball coaches
    public function volleyball()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Volleyball');
            })
            ->get();

        return view('pages.volleyball', ['coaches' => $coaches]);
    }

    // Function to get badminton coaches
    public function badminton()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Badminton');
            })
            ->get();

        return view('pages.badminton', ['coaches' => $coaches]);
    }

    // Function to get baseball coaches
    public function baseball()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Baseball');
            })
            ->get();

        return view('pages.baseball', ['coaches' => $coaches]);
    }

    // Function to get table tennis coaches
    public function tableTennis()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Table Tennis');
            })
            ->get();

        return view('pages.tableTennis', ['coaches' => $coaches]);
    }

    // Function to get athletics coaches
    public function athletics()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Athletics');
            })
            ->get();

        return view('pages.athletics', ['coaches' => $coaches]);
    }

    // Function to get karate coaches
    public function karate()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Karate');
            })
            ->get();

        return view('pages.karate', ['coaches' => $coaches]);
    }

    // Function to get chess coaches
    public function chess()
    {
        $coaches = Coach::with('user')
            ->whereHas('user', function ($query) {
                $query->where('usertype', 'Coach')
                      ->where('coaching_sport', 'Chess');
            })
            ->get();

        return view('pages.chess', ['coaches' => $coaches]);
    }
}
