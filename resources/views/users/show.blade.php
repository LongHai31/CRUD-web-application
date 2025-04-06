@extends('users.layouts')

@section('content')
<div class="container">
    <h1>User Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
            
            <div class="mt-3">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')

@endpush