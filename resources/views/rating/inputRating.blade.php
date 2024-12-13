<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Rating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white py-3">
                <h2 class="text-center mb-0">Rating</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Author Selection Form -->
                <form action="{{ route('rating.index') }}" method="GET" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Book Author:</label>
                        <select name="author_id" id="author_id" class="form-select" onchange="this.form.submit()" required>
                            <option value="" disabled selected>Select an author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                <!-- Rating Submission Form -->
                <form action="{{ route('rating.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Book Name:</label>
                        <select name="book_id" id="book_id" class="form-select" required>
                            <option value="" disabled selected>Select a book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating:</label>
                        <select name="rating" id="rating" class="form-select" required>
                            <option value="" disabled selected>Select a rating</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Navigasi Halaman -->
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('book.listBook') }}" class="btn btn-dark">Back to Book List</a>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
