<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar__logo">POS System</div>
        <nav class="sidebar__nav">
            <ul class="sidebar__menu">
                <li class="sidebar__menu-item sidebar__menu-item--active">
                    <a href="/dashboard" class="sidebar__menu-link sidebar__menu-link--main">Dashboard</a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="/categories" class="sidebar__menu-link sidebar__menu-link--main">category</a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="/products" class="sidebar__menu-link sidebar__menu-link--main">Products</a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="/members" class="sidebar__menu-link sidebar__menu-link--main">Members</a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="/profile" class="sidebar__menu-link sidebar__menu-link--main">Profile</a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="container">
        <!-- Main content goes here -->
    </div>
</body>

</html>
