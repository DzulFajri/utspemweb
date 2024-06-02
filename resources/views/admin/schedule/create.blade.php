<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('schedule.store') }}">
                        @csrf

                        <!-- Date -->
                        <div class="mb-4">
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"
                                required autofocus />
                        </div>

                        <!-- Day -->
                        <div class="mb-4">
                            <x-input-label for="day" :value="__('Day')" />
                            <x-text-input id="day" class="block mt-1 w-full" type="text" name="day"
                                required />
                        </div>

                        <!-- Employee Name -->
                        <div class="mb-4">
                            <x-input-label for="employee_name" :value="__('Employee Name')" />
                            <x-text-input id="employee_name" class="block mt-1 w-full" type="text"
                                name="employee_name" required />
                        </div>

                        <!-- Working Hours -->
                        <div class="mb-4">
                            <x-input-label for="working_hours" :value="__('Working Hours')" />
                            <x-text-input id="working_hours" class="block mt-1 w-full" type="text"
                                name="working_hours" required />
                        </div>

                        <!-- Attendance Status -->
                        <div class="mb-4">
                            <x-input-label for="attendance_status" :value="__('Attendance Status')" />
                            <x-text-input id="attendance_status" class="block mt-1 w-full" type="text"
                                name="attendance_status" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
