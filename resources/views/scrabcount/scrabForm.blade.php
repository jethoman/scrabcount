@extends('layouts.master')

@section('title')
Scrabblish Word Counter for Scrabble
@endsection

@section('content')
<?php if($scrabWordVal > 0 and (count($errors)==0)): ?>
          <div class='alert-ok'>Your word is worth {{$scrabWordVal}} points!</div>
        <?php endif; ?>
    <div class="alert-warning">
        @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</div>
<form method='GET' action='/count'>
            <label>Enter the word you played (required field):
                <input type='text' name='word' value='{{ $scrabWord or '' }}'>
            </label><br>
            <fieldset class='adjustments'>
                <legend>Bonus Points</legend>
                    <label><input type='radio' name='bonus' value='none'
                        <?php if($scrabBonus == 'none' or $scrabBonus == '') echo 'CHECKED'?>> None</label>
                    <label><input type='radio' name='bonus' value='double'
                        <?php if($scrabBonus == 'double') echo 'CHECKED'?>> Double Word Score</label>
                    <label><input type='radio' name='bonus' value='triple'
                        <?php if($scrabBonus == 'triple') echo 'CHECKED'?>> Triple Word Score</label>
            </fieldset>
            <fieldset class='adjustments'>
                <legend>Include 50 point "bingo"? (word must be at least 7 letters)</legend>
                    <label><input type='checkbox' name='bingo'
                        {{ ($scrabBingo) ? 'CHECKED' : '' }}> Yes</label>

            </fieldset>
            <input type='submit' class='btm btm-primary btn-small'>

        </form>
@endsection
