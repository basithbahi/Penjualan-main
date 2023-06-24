@extends('layouts.admin')

<style>
    body {
        background-color: #123456;
        color: #ffffff;
    }

    .center-table {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    table {
        border-collapse: collapse;
        width: 50%;
        max-width: 500px;
        border: 2px solid #000;
        color: #ffffff;
        margin: 0 auto;
        margin-top: 20px;
    }

    th, td {
        border: 2px solid #000;
        padding: 8px;
        text-align: left;
        color: #ffffff;
    }

    th {
        background-color: #f2f2f2;
    }

    .edit-button {
        text-align: center;
    }


    .center-section {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .profile-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }


</style>

@section('contents')
<div class="center-section">
    <div class="center-table">
        <h1 class="profile-title">PROFILE ADMIN</h1>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <tbody>
                    @if (Auth::check())
                    <tr>
                        <td style="color: black;">NIK:</td>
                        <td style="color: black;">{{ Auth::user()->nik }}</td>
                    </tr>
                    <tr>
                        <td style="color: black;">Nama:</td>
                        <td style="color: black;">{{ Auth::user()->nama }}</td>
                    </tr>
                    <tr>
                        <td style="color: black;">Alamat:</td>
                        <td style="color: black;">{{ Auth::user()->alamat }}</td>
                    </tr>
                    <tr>
                        <td style="color: black;">TTL:</td>
                        <td style="color: black;">{{ Auth::user()->ttl }}</td>
                    </tr>
                    <tr>
                        <td style="color: black;">JK:</td>
                        <td style="color: black;">{{ Auth::user()->jk }}</td>
                    </tr>
                    <tr>
                        <td style="color: black;">Email:</td>
                        <td style="color: black;">{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td style="color: black;">Foto Profil:</td>
                        <td><img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Foto Profil" height="60"></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <br>
        <div class="edit-button">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{ route('user.editProfile', ['user' => Auth::user()]) }}" class="btn btn-primary">Edit</a>

        </div>

    </div>
</div>
@endsection
