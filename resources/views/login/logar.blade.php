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
      

      <form action="{{ route('login') }}" method="post">
        @csrf

        @include('login.componentesLogin.input',[
            'placeholder' => 'Email',
            'type' => 'email',
            'name' =>'email',
            'icon'=> 'bi bi-envelope'
        ])
        @include('login.componentesLogin.input',[
            'placeholder' => 'Senha',
            'type' => 'password',
            'name' =>'password',
            'icon'=>'bi bi-lock'
        ])

        <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Logar</button> 
        </div>
      </form>

      <div class="row">
        <a href="{{ route('register') }}" class="text-center">Criar Conta</a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

@endsection