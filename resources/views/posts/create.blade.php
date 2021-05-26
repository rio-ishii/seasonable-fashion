@extends('layouts.app')

@section('content')
  <form action="{{ action('PostsController@create') }}" method="post" enctype="multipart/form-data" style="padding-top: 5rem">
    <!-- アップロードフォームの作成 -->
    <input type="file" name="image"><br><br>
    
    説明<br>
    <textarea name = "comment" rows = "4" cols = "40">
    
    </textarea>
    <br>
    
    天気
    <select name = "weather">
      <option value="">-</option>
      <option value="晴れ">晴れ</option>
      <option value="曇り">曇り</option>
      <option value="雨">雨</option>
      <option value="雪">雪</option>
    </select>
    <br>
    
    最高気温
  　<select name = "highest temperature">
      <option value="">-</option>
      <option value="-10">-10</option>
      <option value="-9">-9</option>
      <option value="-8">-8</option>
      <option value="-7">-7</option>
      <option value="-6">-6</option>
      <option value="-5">-5</option>
      <option value="-4">-4</option>
      <option value="-3">-3</option>
      <option value="-2">-2</option>
      <option value="-1">-1</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
      <option value="32">32</option>
      <option value="33">33</option>
      <option value="34">34</option>
      <option value="35">35</option>
      <option value="36">36</option>
      <option value="37">37</option>
      <option value="38">38</option>
      <option value="39">39</option>
      <option value="40">40</option>
      <option value="41">41</option>
      <option value="42">42</option>
  　</select>度
  　<br>
  　
  最低気温
  　<select name = "lowest temperature">
  　   <option value="">-</option>
  　   <option value="-30">-30</option>
      <option value="-29">-29</option>
      <option value="-28">-28</option>
      <option value="-27">-27</option>
      <option value="-26">-26</option>
      <option value="-25">-25</option>
      <option value="-24">-24</option>
      <option value="-23">-23</option>
      <option value="-22">-22</option>
      <option value="-21">-21</option>
      <option value="-20">-20</option>
      <option value="-19">-19</option>
      <option value="-18">-18</option>
      <option value="-17">-17</option>
      <option value="-16">-16</option>
      <option value="-15">-15</option>
      <option value="-14">-14</option>
      <option value="-13">-13</option>
      <option value="-12">-12</option>
      <option value="-11">-11</option>
      <option value="-10">-10</option>
      <option value="-9">-9</option>
      <option value="-8">-8</option>
      <option value="-7">-7</option>
      <option value="-6">-6</option>
      <option value="-5">-5</option>
      <option value="-4">-4</option>
      <option value="-3">-3</option>
      <option value="-2">-2</option>
      <option value="-1">-1</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
      <option value="32">32</option>
  　</select>度
  　<br>
  　
    {{ csrf_field() }}
    
    <input type="submit" value="投稿する">
  </form>
  
@endsection
