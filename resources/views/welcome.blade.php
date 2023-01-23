<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                @auth
                    Hi, {{auth()->user()->name}} ({{auth()->user()->role}})
                @endauth

                @guest
                    <div class="text-end">
                    <a href="{{ route('login.show') }}" class="btn me-2">Login</a>
                    </div>
                @endguest
                </form>
            </div>
        </nav>
        <div class="pull-right mt-2">
            <a class="btn btn-success" href="{{ route('users.index') }}"> Daftar Karyawan</a>
            <a class="btn btn-success" href="{{ route('roles.index') }}"> Daftar Role</a>
        </div>
    </div>
</body>
</html>