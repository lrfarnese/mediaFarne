@extends('layouts.register')
@section('title', 'MediaFarne-Login')
@section('classe-body','register-page')

@section('form')

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Media</b>Farne</a>
    </div>
    <div class="card-body">
      

      <form action="{{ route('register') }}" method="post">
        @csrf

        @include('login.componentesLogin.input',[
            'placeholder' => 'Nome Completo',
            'type' => 'text',
            'name' =>'name'
        ])
        @include('login.componentesLogin.input',[
            'placeholder' => 'Email',
            'type' => 'email',
            'name' =>'email'
        ])
        @include('login.componentesLogin.input',[
            'placeholder' => 'Senha',
            'type' => 'password',
            'name' =>'password'
        ])
        @include('login.componentesLogin.input',[
            'placeholder' => 'Confirmar senha',
            'type' => 'password',
            'name' =>'password_confirmation'
        ])

        <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Criar conta</button> 
        </div>
      </form>

      <div class="row">
        <a href="{{ route('login') }}" class="text-center">Já tem conta?</a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

@endsection