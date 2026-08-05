@extends('layouts.admin')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0 fw-semibold">Editar Usuário: {{ $user->name }}</h4>
        <a href="{{ route('admin.user') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.user.update', encrypt($user->id)) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium small mb-1">Nome Completo</label>
                        @include('components.componentes-login.input', [
                            'placeholder' => 'Ex: João da Silva',
                            'type' => 'text',
                            'name' => 'name',
                            'icon' => 'bi bi-person',
                            'value' => $user->name
                        ])
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-medium small mb-1">Nome de Usuário (Username)</label>
                        @include('components.componentes-login.input', [
                            'placeholder' => 'Ex: joaosilva',
                            'type' => 'text',
                            'name' => 'username',
                            'icon' => 'bi bi-at',
                            'value' => $user->username
                        ])
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-medium small mb-1">E-mail</label>
                        @include('components.componentes-login.input', [
                            'placeholder' => 'joao@email.com',
                            'type' => 'email',
                            'name' => 'email',
                            'icon' => 'bi bi-envelope',
                            'value' => $user->email
                        ])
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-medium small mb-1">Data de Nascimento</label>
                        @include('components.componentes-login.input', [
                            'placeholder' => 'dd/mm/aaaa',
                            'type' => 'date',
                            'name' => 'data_nascimento',
                            'icon' => 'bi bi-calendar',
                            'value' => $user->data_nascimento ? \Carbon\Carbon::parse($user->data_nascimento)->format('Y-m-d') : ''
                        ])
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-medium small mb-1">Tipo de Usuário</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                            <option value="comum" {{ old('type', $user->type) == 'comum' ? 'selected' : '' }}>Comum</option>
                            <option value="admin" {{ old('type', $user->type) == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                        @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save"></i> Atualizar Usuário
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection