@extends('layouts_admin.main')

@section('content')
<style>
    img
    {
        width: 100px;
        height: 100px;
        border-radius: 10px;
    }
</style>
<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('create') }}"><i class="fas fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Foto Profile</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $user1): ?>
                    <tr>
                    <td>{{ $user1->user_id }}</td>
                    <td>{{ $user1->name }}</td>
                    <td>{{ $user1->no_hp }}</td>
                    <td>{{ $user1->email }}</td>
                    <td>{{ $user1->username }}</td>
                    <td>{{ $user1->password }}</td>
                    <td>{{ $user1->role }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $user1->profile_image) }}">
                    </td>
                        <td>
                            <a href="{{ route('edit', $user1->user_id) }}" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('delete', $user1->user_id) }}" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>         
                </tbody>
            </table>

            {!! $user->links() !!}

        </div>
    </div>
</div>
@endsection