<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CLub;
use App\Models\Player;
class PlayerController extends Controller
{
    public function index()
    {
     //   $comments = Comment::with('post')->get();
       $players = Player::with('club')->paginate(10);
        return view('players.index', compact('players'));
    }


    public function create()
    {
        $players = Player::all();

        $clubs = CLub::all();
        return view('players.create', compact('players' ,'clubs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'number' => 'required|numeric',
            'birthday' => 'required|numeric',
            'club_id' => 'required|exists:clubs,id',
        ], [
                'name.required' => 'Tên Cau thu là bắt buộc.',
                'number.numeric' => 'Số áo phải là số.',
        ]);

        Player::create($request->all());

        return redirect()->route('players.index')->with('success', 'Bài viết đã được thêm thành công!');
    }


    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect()->route('players.index')->with('successDelete', 'van de da duoc xoa thanh cong!');
    }

    public function edit($id)
    {
        $player = Player::findOrFail($id); // Lấy sản phẩm theo ID
        $clubs = Club::all(); 
        return view('players.edit', compact('player', 'clubs'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'number' => 'required|numeric',
            'birthday' => 'required|numeric',
            'club_id' => 'required|exists:clubs,id',
        ], [
            'name.required' => 'Tên Cau thu là bắt buộc.',
            'number.numeric' => 'Số áo phải là số.',
            'birthday.numeric' => 'ngày sinh phải là số.',
        ]);

        $player = Player::findOrFail($id);
        $player->update($request->all()); // Cập nhật sản phẩm
        return redirect()->route('players.index')->with('successEdit', 'Sản phẩm đã được cập nhật thành công.');
    }
}
