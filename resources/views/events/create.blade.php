@extends('layouts.master')
@section('title', '募集作成ページ')
@section('stylesheet')
  <link rel="stylesheet" href="css/toiawase.css"/>
@endsection
@section('content')
  <h1>セット募集掲示板</h1>
  <form method="POST" action=" ">
    {{ csrf_field() }}
    <table>
        <tr>
            <td><b>タイトル：</b></td>
            <td><input type="text" name="event_title"></td>
        </tr>
        <tr>
            <td><b>地域：</b></td>
            <td><input type="text" name="area"></td>
        </tr>
        <tr>
            <td><b>場所：</b></td>
            <td><input type="text" name="place"></td>
        </tr>
        <tr>
            <td><b>開催日：</b></td>
            <td><input type="date" name="event_date"></td>
        </tr>
        <tr>
            <td><b>開始時間</b></td>
            <td><input type="time" name="event_time"></td>
        </tr>
        <tr>
            <td><b>レート：</b></td>
            <td>1000点：<input type="int" name="rate">円</td>
        </tr>
    </table>
        <input type="submit" value="送信">
        <input type="reset" value="リセット">
  </form>
@endsection