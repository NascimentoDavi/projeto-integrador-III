@extends('layouts.app')

@section('title', 'Bank Accounts')

@section('content')

    <div class="container mt-4">
        <h2>Criar Conta Bancária</h2>

        <form action="" method="POST">
            @csrf

            <div class="mb-3">
                <label for="bank_name" class="form-label">Apelido da Conta</label>
                <input type="text" class="form-control" id="bank_name" name="bank_name" required>
            </div>


            <div class="mb-3">
                <label for="bank_name" class="form-label">Instituição Bancária</label>
                <input type="text" class="form-control" id="bank_name" name="bank_name" required>
            </div>

            <div class="mb-3">
                <label for="account_number" class="form-label">Número da Conta</label>
                <input type="text" class="form-control" id="account_number" name="account_number" required>
            </div>

            <div class="mb-3">
                <label for="agency" class="form-label">Agência</label>
                <input type="text" class="form-control" id="agency" name="agency" required>
            </div>

            <div class="mb-3">
                <label for="account_type" class="form-label">Tipo de Conta</label>
                <select class="form-select" id="account_type" name="account_type" required>
                    <option value="">Selecione</option>
                    <option value="corrente">Corrente</option>
                    <option value="poupança">Poupança</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Conta</button>
        </form>
    </div>

@endsection
