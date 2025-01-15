<!-- resources/views/index.blade.php -->
@extends('header.header')

@section('title', 'Danh Sách Bài Viết')

@section('content')
<div class="container">
    <h1>Danh Sách Cau thu</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên cầu thủ</th>
                <th>vị trí</th>
                <th>Số áo</th>
                <th>Sinh nhật</th>
                <th>Câu lạc bộ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{$player->id}}</td>
                    <td>
                        <h3 class="post-title">{{ $player->name }}</h3>
                    </td>

                    <td>
                        <h3 class="post-content">{{ $player->position  }}</h3>
                    </td>
                    <td>
                        <h3 class="post-content">{{ $player->number  }}</h3>
                    </td>
                    <td>
                        <h3 class="post-content">{{ $player->birthday  }}</h3>
                    </td>
                    <td>
                        <h3 class="post-content">{{ $player->club->name  }}</h3>
                    </td>

                    <td style="display: flex">
                        <a href="{{route('players.edit', $player -> id)}}" class="btn btn-warning edit">Edit</a>
                        <form action="{{route('players.destroy', $player -> id)}}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete">Delete</button>
                        </form>
                        <a href=""><button class="btn btn-success">Show</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div id="successModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px;">
            <h3>Thông Báo</h3>
            <p>Cầu thủ đã được thêm thành công!</p>
            <button onclick="closeModal()"
                style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px;">Đóng</button>
        </div>
    </div>


    <div id="successModalEdit"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px;">
            <h3>Thông Báo</h3>
            <p>Cầu thủ đã được Cập nhật thành công!</p>
            <button onclick="closeModalEdit()"
                style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px;">Đóng</button>
        </div>
    </div>

    <div id="successModalDelete"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px;">
            <h3>Thông Báo</h3>
            <p>Cầu thủ đã được Xóa thành công!</p>
            <button onclick="closeModalEdit()"
                style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px;">Đóng</button>
        </div>
    </div>

    <div class="pagination">
        {{ $players->links() }}
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