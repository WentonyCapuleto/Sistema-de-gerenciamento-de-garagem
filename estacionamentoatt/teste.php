<!DOCTYPE html>
<html>
<head>
    <title>Tabela com DataTables</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <table id="myTable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>João</td>
                <td>joao@example.com</td>
            </tr>
            <tr>
                <td>Maria</td>
                <td>maria@example.com</td>
            </tr>
            <tr>
                <td>Carlos</td>
                <td>carlos@example.com</td>
            </tr>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
