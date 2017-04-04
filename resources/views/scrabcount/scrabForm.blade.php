@extends('layouts.master')

@section('title')
Scrabblish Word Counter for Scrabble
@endsection

@section('content')
<?php if(isset($scrabWordVal)and (!$errors)): ?>
          <div class='alert-ok'>Your word is worth {{$scrabWordVal}} points!</div>
        <?php endif; ?>
        <?php if($errors): ?>
          <div class='alert-warning'>
            <?php foreach($errors as $error): ?>
              <?=$error?><br>
            <?php endforeach; ?>
        </div>
      <?php endif; ?>
<form method='GET' action='/count'>
            <label>Enter the word you played (required field):
                <input type='text' name='word' value='{{ $scrabWord or '' }}'>
            </label><br>
            <!-- <fieldset class='adjustments'>
                <legend>Bonus Points</legend>
                    <label><input type='radio' name='bonus' value='none'
                        <?php if($scrabBonus == 'none' or $scrabBonus == '') echo 'CHECKED'?>> None</label>
                    <label><input type='radio' name='bonus' value='double'
                        <?php if($scrabBonus == 'double') echo 'CHECKED'?>> Double Word Score</label>
                    <label><input type='radio' name='bonus' value='triple'
                        <?php if($scrabBonus == 'triple') echo 'CHECKED'?>> Triple Word Score</label>
            </fieldset> -->
            <fieldset class='adjustments'>
                <legend>Include 50 point "bingo"? (word must be at least 7 letters)</legend>
                    <label><input type='checkbox' name='bingo'
                        {{ ($scrabBingo) ? 'CHECKED' : '' }}> Yes</label>

            </fieldset>
            <input type='submit' class='btm btm-primary btn-small'>

        </form>
@endsection
