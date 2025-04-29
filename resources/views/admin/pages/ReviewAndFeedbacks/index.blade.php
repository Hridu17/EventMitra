@extends('admin.inc.main')

@section('container')
    <h2>User Feedbacks</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->feedback }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No feedback found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
