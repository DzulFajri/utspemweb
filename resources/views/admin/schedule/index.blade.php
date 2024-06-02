<!-- Tampilan index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-10">{{ __('List of work schedule') }}</h2>
                    <div class="pt-5">
                        <div class="max-w-7xl mx-auto space-y-6">
                            <div class="sm:p-8">
                                <a class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    href="{{ route('schedule.create') }}"> Create Schedule</a>
                            </div>
                        </div>
                    </div>

                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Date</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Day</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Employee Name</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Working Hours</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Attendance Status</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($schedules as $schedule)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $schedule->date }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $schedule->day }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $schedule->employee_name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $schedule->working_hours }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $schedule->attendance_status }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5 font-medium">
                                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
