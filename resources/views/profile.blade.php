<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head tags and stylesheets -->
    <style>
        .center-table {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #000;
        }

        th, td {
            border: 2px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button {
            margin-top: 20px;
        }

        .edit-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .edit-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="center-table">
        <h2>Profile</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    @if (Auth::check())
                        <tr>
                            <td>NIK:</td>
                            <td>{{ Auth::user()->nik }}</td>
                        </tr>
                        <tr>
                            <td>Nama:</td>
                            <td>{{ Auth::user()->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat:</td>
                            <td>{{ Auth::user()->alamat }}</td>
                        </tr>
                        <tr>
                            <td>TTL:</td>
                            <td>{{ Auth::user()->ttl }}</td>
                        </tr>
                        <tr>
                            <td>JK:</td>
                            <td>{{ Auth::user()->jk }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="edit-button">
            <a href="{{ route('user.edit', Auth::user()->id) }}">Edit</a>
        </div>
    </div>
    <!-- Additional HTML and JavaScript code -->
</body>
</html>
