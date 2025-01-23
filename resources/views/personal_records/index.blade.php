<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Recorde Pessoal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h2>Cadastrar Recorde Pessoal</h2>
    <form method="POST" action="{{ route('ranking.store') }}">
    @csrf 
                <div class="mb-3">
            <label for="userName" class="form-label">Nome do Usuário</label>
            <input type="text" class="form-control" id="userName" name="userName" required>
        </div>
        <div class="mb-3">
            <label for="movement_id" class="form-label">Movimento</label>
            <select class="form-select" id="movement_id" name="movement_id" required>
                <option value="">Selecione um Movimento</option>
                @foreach($movements as $movement)
                    <option value="{{ $movement->id }}">{{ $movement->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="recordValue" class="form-label">Recorde</label>
            <input type="number" class="form-control" id="recordValue" name="recordValue" required>
        </div>
        <div class="mb-3">
            <label for="recordDate" class="form-label">Data</label>
            <input type="date" class="form-control" id="recordDate" name="recordDate" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Recorde Pessoal</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
