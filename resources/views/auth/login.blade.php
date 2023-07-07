@extends('auth.layouts.main')

@section('main-body')

@if (session()->has('pesan'))
        {!! session('pesan') !!}
@endif

<div class="login-page">
    <div class="form">
      <form class="register-form" action="/register" method="post">
        @csrf

        <input type="email" placeholder="email" name="user_email" required/>
        <input type="password" placeholder="password" name="password" required/>
        <input type="text" placeholder="nama" name="user_nama" required/>
        <textarea name="user_alamat" placeholder="Isi alamat..."></textarea>
        <input type="text" placeholder="No Hp" name="user_hp" required/>
        <input type="text" placeholder="Kode Pos" name="user_pos" required/>

        <button type="submit">create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>

      <form class="login-form" action="/login" method="post">
        @csrf

        <input type="text" placeholder="username" name="user_email" required/>
        <input type="password" placeholder="password" name="password" required/>
        <button type="submit">login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
  </div>

@endsection
