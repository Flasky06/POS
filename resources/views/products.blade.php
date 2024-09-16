<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS - products</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include jQuery and Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .container {
            margin-left: 250px;
            /* Space for sidebar */
            padding: 20px;
            flex: 1;
            max-width: 1000px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container__header {
            margin-bottom: 20px;
            /* Optional background color and border */
            /* background-color: #f8f9fa; */
            /* border-bottom: 1px solid #ddd; */
        }

        .container__header h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .container__actions {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .container__actions .search {
            width: 50%;
        }

        .container__actions input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        /* Table Styles */
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-table th,
        .product-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .product-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .product-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .product-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            align-items: center;
            justify-content: center;
            /* Center modal vertically and horizontally */
            display: flex;
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            margin: 0 20% 10%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .modal-header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-form {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
            width: 100%;
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .form-group label {
            width: 120px;
            font-weight: bold;
            margin-right: 10px;
            text-align: right;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .modal-buttons {
            grid-column: 1 / 3;
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .primary {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .danger {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .primary:hover,
        .danger:hover {
            opacity: 0.9;
        }


        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                margin-left: 0;
            }
        }
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
                    <a href="/products" class="sidebar__menu-link sidebar__menu-link--main">Products</a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="/customers" class="sidebar__menu-link sidebar__menu-link--main">Customers</a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="/profile" class="sidebar__menu-link sidebar__menu-link--main">Profile</a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="container">
        <div class="container__header">
            <h2>Product List</h2>
        </div>
        <div class="container__actions">
            <div class="search">
                <input type="text" placeholder="Search here">
            </div>
            <div class="container__buttons">
                <button class="primary" id="openModalBtn">Add Product</button>
                <button class="danger">Delete</button>
            </div>
        </div>
        <table class="product-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Purchase Price</th>
                    <th>Selling Price</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row -->
                <tr>
                    <td>1</td>
                    <td>P001</td>
                    <td>Samsung series4</td>
                    <td>Television</td>
                    <td>Samsung</td>
                    <td>ksh50000</td>
                    <td>ksh60000</td>
                    <td>2</td>
                    <td>43</td>
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
                    <h2 id="modalTitle">Add Product</h2>
                    <span class="close" aria-label="Close">&times;</span>
                </div>
                <hr>
                <form id="addProductForm" class="modal-form">
                    <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" class="category-select" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="electronics">Electronics</option>
                            <option value="furniture">Furniture</option>
                            <option value="groceries">Groceries</option>
                            <!-- Add more categories here -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="brand">Brand:</label>
                        <input type="text" id="brand" name="brand" required>
                    </div>
                    <div class="form-group">
                        <label for="purchasePrice">Purchase Price:</label>
                        <input type="number" id="purchasePrice" name="purchasePrice" required>
                    </div>
                    <div class="form-group">
                        <label for="sellingPrice">Selling Price:</label>
                        <input type="number" id="sellingPrice" name="sellingPrice" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount:</label>
                        <input type="number" id="discount" name="discount">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" id="stock" name="stock" required>
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
