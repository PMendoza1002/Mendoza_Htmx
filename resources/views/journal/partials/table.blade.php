<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Date</th>

            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($journals as $journal)
            <tr>
                <td>{{ $journal->title }}</td>
                <td>{{ $journal->created_at->format('F j, Y') }}</td>

                <td class="text-center">
                    <a href="{{ route('journal.show', $journal->id) }}" 
                       class="btn btn-info btn-sm" title="View Entry">View</a>

                    <form action="{{ route('journal.destroy', $journal->id) }}" 
                          method="POST" 
                          class="d-inline"
                          hx-delete="{{ route('journal.destroy', $journal->id) }}"
                          hx-target="#journal-table"
                          hx-swap="innerHTML"
                          hx-confirm="Are you sure you want to delete this entry?">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
