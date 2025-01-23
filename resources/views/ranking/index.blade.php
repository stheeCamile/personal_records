<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking de Movimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> 
    <style>
        table.dataTable {
            border-collapse: collapse;
            width: 100%;
        }

        table.dataTable thead th {
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table.dataTable tbody tr:hover {
            background-color: #f1f1f1;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Ranking do Movimento - Deadlift</h2>
    <table id="rankingTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">Posição</th>
                <th class="text-center">Nome do Usuário</th>
                <th class="text-center">Recorde Pessoal</th>
                <th class="text-center">Data</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#rankingTable').DataTable({
            "processing": true,     
            "serverSide": true,     
            "paging": false,        
            "info": false,         
            "searching": false,    
            "ajax": {
                url: "/api/ranking/1",  
                type: "GET",
                dataSrc: function (json) {
                    return json.map(function(item, index) {
                        item.position = index + 1;  
                        return item;
                    });
                }
            },
            "columns": [
                { "data": "position", "class": "text-center" },
                { "data": "userName", "class": "text-center" },
                { "data": "recordValue", "class": "text-center" },
                { "data": "recordDate", "class": "text-center" }
            ]
        });
    });
</script>

</body>
</html>
