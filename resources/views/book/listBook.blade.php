<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <h1 class="card-title mb-4 text-center">List of Books</h1>

            <!-- Filter dan Search -->
            <form method="GET" action="{{ route('book.listBook') }}" class="row g-3 mb-5">
                <div class="col-md-3">
                    <label for="list_shown" class="form-label fw-semibold">List Shown :</label>
                    <select name="list_shown" id="list_shown" class="form-select">
                        @for ($i = 10; $i <= 100; $i += 10)
                            <option value="{{ $i }}" {{ request('list_shown') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="search" class="form-label fw-semibold">Search :</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Enter book or author name" value="{{ request('search') }}">
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>

            <!-- Navigasi Halaman -->
            <div class="col-md-12 d-flex justify-content-end mb-3 mt-5">
                <a href="{{ route('authors.topFamous') }}" class="btn btn-danger me-2">Top Famous</a>
                <a href="{{ route('rating.index') }}" class="btn btn-warning">Input Rating</a>
            </div>

            <!-- Books Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Book Name</th>
                        <th>Category Name</th>
                        <th>Author Name</th>
                        <th>Average Rating</th>
                        <th>Voter</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($books as $index => $book)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ number_format($book->average_rating,2) }}</td>
                            <td>{{ $book->voter }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No books found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
