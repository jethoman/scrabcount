<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrabController extends Controller
{
    private $scrabWord;
    private $scrabBonus;
    private $scrabBingo;

    public function allLetters(Request $request) {
        if($_GET){
            $this->validate($request, [
           'word' => 'required|alpha',
         ]);
        }

        $this->scrabWord = $request->input('word','');
        $this->scrabBonus = $request->input('bonus',null);
        $this->scrabBingo = $request->has('bingo');

        return $this->countVal($this->scrabWord,$this->scrabBonus,$this->scrabBingo);

    }

    public function countVal(String $scrabWord,$scrabBonus,$scrabBingo){
        $alphabetJson = file_get_contents(database_path().'/alphabet.json');
        $alphabet = json_decode($alphabetJson, true);
        $scrabLetters = str_split($scrabWord);
        $wordSize = sizeof($scrabLetters);
        $scrabWordVal = 0;



        foreach ($scrabLetters as $entries => $entry) {
        #cycling through my entered word
            foreach ($alphabet as $letters =>$letter) {
                # since all of my alphabet is all caps I am converting my entry
                 if (strtoupper($entry)==$letters){
                   $scrabWordVal = $scrabWordVal + $letter['value'];
                   continue;
                 }
            }

        }
        if($scrabBonus == 'double')
        {
            $scrabWordVal = $scrabWordVal * 2;
        } elseif($scrabBonus == 'triple') {
            $scrabWordVal = $scrabWordVal * 3;
        }
        if($scrabBingo and $wordSize >= 7)
        {
            $scrabWordVal = $scrabWordVal + 50;
        }


        return view('scrabcount.scrabForm')->with([
            'scrabWord' => $this->scrabWord,
            'scrabBonus' => $this->scrabBonus,
            'scrabWordVal' => $scrabWordVal,
            'scrabBingo' => $scrabBingo
        ]);

        }
    }
