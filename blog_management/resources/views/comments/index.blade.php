<!-- resources/views/index.blade.php -->
@extends('header.header')

@section('title', 'Danh Sách Bài Viết')

@section('content')
<div class="container">
    <h1>Danh Sách Bài Viết</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đềđề</th>
                <th>Nội dung bài viết</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>
                        <h3 class="post-title">{{ $post->title }}</h3>
                    </td>

                    <td>
                        <h3 class="post-content">{{ $post->content }}</h3>
                    </td>

                    <td style="display: flex">
                        <a href="{{ route('comments.edit', $post->id) }}" class="btn btn-warning edit">Edit</a>
                        <form action="{{route('comments.destroy', $post->id)}}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete">Delete</button>
                        </form>
                        <a href="{{route('comments.show', $post->id)}}"><button class="btn btn-success">Show</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div id="successModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px;">
            <h3>Thông Báo</h3>
            <p>Bài viết đã được Đăng tải thành công thành công!</p>
            <button onclick="closeModal()"
                style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px;">Đóng</button>
        </div>
    </div>


    <div id="successModalEdit"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px;">
            <h3>Thông Báo</h3>
            <p>Bài viết đã được Cập nhật thành công!</p>
            <button onclick="closeModalEdit()"
                style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px;">Đóng</button>
        </div>
    </div>

    <div id="successModalDelete"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px;">
            <h3>Thông Báo</h3>
            <p>Bài viết đã được Xóa thành công!</p>
            <button onclick="closeModalEdit()"
                style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px;">Đóng</button>
        </div>
    </div>

    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>
@endsection


@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('successModal').style.display = 'flex';
        });

        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }
    </script>
@endif

@if(session('successEdit'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('successModalEdit').style.display = 'flex';
        });

        function closeModalEdit() {
            document.getElementById('successModalEdit').style.display = 'none';
        }
    </script>
@endif

@if(session('successDelete'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('successModalDelete').style.display = 'flex';
        });

        function closeModalEdit() {
            document.getElementById('successModalDelete').style.display = 'none';
        }
    </script>
@endif