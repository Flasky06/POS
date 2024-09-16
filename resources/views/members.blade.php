<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS - members</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include jQuery and Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>

    </style>
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

    {{-- container --}}
    <div class="container">
        <div class="container__header">
            <h2>Members List</h2>
        </div>
        <div class="container__actions">
            <div class="search">
                <input type="text" placeholder="Search here">
            </div>
            <div class="container__buttons">
                <button class="primary" id="openModalBtn">Members List</button>
            </div>
        </div>


        {{-- table --}}
        <table class="product-table">
            <thead>
                <tr>
                    <th>No</th>
                   <th>Code</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                <!-- Example Row -->
                <tr>
                    <td>1</td>
                    <td>POO2</td>
                    <td>Bonface Njuguna</td>
                    <td>+254717299106</td>
                    <td>bonnienjuguna@gmail.com</td>



                    <td><button class="primary">Edit</button> <button class="danger">Delete</button></td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>

        <!-- Modal for Adding Product -->
        <div id="addProductModal" class="modal" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"
            style="display: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="modalTitle">Add Category</h2>
                    <span class="close" aria-label="Close">&times;</span>
                </div>
                <hr>
                <form id="addProductForm" class="modal-form">

                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="modal-buttons">
                        <button type="submit" class="primary">Save</button>
                        <button type="button" class="danger close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const modal = document.getElementById('addProductModal');
        const closeModalBtns = document.querySelectorAll('.close');

        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        closeModalBtns.forEach(button => {
            button.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        // dropdown search
        $(document).ready(function() {
            $('.category-select').select2({
                placeholder: "Select or search for a category",
                allowClear: true,
                width: '100%'
            });
        });

        window.onload = function() {
            modal.style.display = 'none';
        };

        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        closeModalBtns.forEach(button => {
            button.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        document.getElementById('addProductForm').addEventListener('submit', function(event) {
            event.preventDefault();
            modal.style.display = 'none';
        });
    </script>
</body>

</html>
