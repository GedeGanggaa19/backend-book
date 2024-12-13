<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Most Famous Authors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center mb-3 py-3">
            <h1 class="h3 mb-0">Top 10 Most Famous Authors</h1>
        </div>
        <div class="card-body">

            <!-- Navigasi Halaman -->
            <div class="col-md-12 d-flex justify-content-end mb-3">
                <a href="{{ route('book.listBook') }}" class="btn btn-dark">Back to Book List</a>
            </div>

            <!-- Authors Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Author Name</th>
                        <th class="text-center">Voter</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($authors as $index => $author)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $author->name }}</td>
                            <td class="text-center">{{ $author->voter }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No authors found</td>
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
