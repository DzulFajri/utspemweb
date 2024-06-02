<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule; // Import model Schedule

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all(); // Mengambil semua data jadwal
        return view('admin.schedule.index', compact('schedules')); // Menampilkan halaman daftar jadwal dengan data jadwal
    }

    public function create()
    {
        return view('admin.schedule.create'); // Menampilkan halaman form tambah jadwal
    }

    public function store(Request $request)
    {
        // Validasi data yang diinput
        $request->validate([
            'date' => 'required',
            'day' => 'required',
            'employee_name' => 'required',
            'working_hours' => 'required',
            'attendance_status' => 'required',
        ]);

        // Menyimpan data jadwal baru ke dalam database
        Schedule::create($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule created successfully.'); // Mengalihkan pengguna kembali ke halaman daftar jadwal dengan pesan sukses
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedule.edit', compact('schedule')); // Menampilkan halaman form edit jadwal dengan data jadwal yang akan diedit
    }

    public function update(Request $request, Schedule $schedule)
    {
        // Validasi data yang diinput
        $request->validate([
            'date' => 'required',
            'day' => 'required',
            'employee_name' => 'required',
            'working_hours' => 'required',
            'attendance_status' => 'required',
        ]);

        // Memperbarui data jadwal yang sudah ada di database
        $schedule->update($request->all());

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule updated successfully.'); // Mengalihkan pengguna kembali ke halaman daftar jadwal dengan pesan sukses
    }

    public function destroy(Schedule $schedule)
    {
        // Menghapus data jadwal dari database
        $schedule->delete();

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule deleted successfully.'); // Mengalihkan pengguna kembali ke halaman daftar jadwal dengan pesan sukses
    }
}
