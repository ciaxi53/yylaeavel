<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Brand Management</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <div class="profile-image">
                    <img src="{{ asset('assets/img/yosef.jpeg') }}" alt="User Image">
                    <a href="#" class="simple-text logo-normal">Brand Management</a>
                </div>

            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('brand.index') }}">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Brand</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <!-- Main Panel -->
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper"></div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- من هنا انا بديت في الكود الباقي لشكل الداش بورد يا هندسة  -->

            <div class="content" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" style="margin-top: 20px;">
                            <div class="card-header">
                                <h4 class="card-title">Brand List</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Supplier</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $brand->name }}</td>
                                                <td>{{ $brand->category }}</td>
                                                <td>{{ $brand->supplier }}</td>
                                                <td>{{ $brand->stock }}</td>
                                                <td>{{ $brand->price }}</td>
                                                <td>{{ $brand->note }}</td>
                                                <td>
                                                    <a href="{{ route('brand.index') }}?edit={{ $brand->id }}"
                                                        class="btn btn-success btn-sm" style="margin-bottom: 5px;">Edit</a>
                                                    <form action="{{ route('brand.destroy', $brand->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="margin-top: 20px;">
                            <div class="card-header">
                                <h5 class="card-title" style="margin-bottom: 20px;">
                                    {{ request()->has('edit') ? 'Edit Brand' : 'Add Brand' }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ request()->has('edit') ? route('brand.update', request('edit')) : route('brand.store') }}"
                                    method="POST">
                                    @csrf
                                    @if(request()->has('edit'))
                                                                        @method('PUT')
                                                                        @php
                                                                            $editingBrand = $brands->firstWhere('id', request('edit'));
                                                                        @endphp
                                    @endif
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $editingBrand->name ?? '' }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" name="category" value="{{ $editingBrand->category ?? '' }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="supplier">Supplier</label>
                                        <input type="text" name="supplier" value="{{ $editingBrand->supplier ?? '' }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" value="{{ $editingBrand->stock ?? '' }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" step="0.01" name="price"
                                            value="{{ $editingBrand->price ?? '' }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note</label>
                                        <textarea name="note"
                                            class="form-control">{{ $editingBrand->note ?? '' }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ request()->has('edit') ? 'Update Brand' : 'Add Brand' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li><a href="#">Creative Tim</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy; {{ date('Y') }}, Designed by <a href="#" target="_blank">Creative Tim</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
</body>

<style>
    .profile-image img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }

    .profile-image {
        display: flex;
        align-items: center;
    }
</style>

</html>
