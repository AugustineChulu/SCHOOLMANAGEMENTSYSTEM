<x-app-layout>
    <div class="create">

        @role('admin')

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Attendance Report</h2>
            </div>
            {{-- <div class="flex flex-wrap items-center">
                <a href="{{ route('dashboard') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div> --}}
        </div>
        
        <div class="w-full mt-8 bg-white rounded">
            <form action="{{ route('attendance.admin') }}" method="GET" class="md:flex md:items-center md:justify-between px-6 py-6 pb-0">
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <div>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Report:
                        </label>
                    </div>
                    <div class="flex flex-row items-center bg-gray-200 px-4 py-3 rounded">
                        <label class="block text-gray-600 font-bold">
                            <input name="type" class="mr-2 leading-tight" type="radio" value="class" checked>
                            <span class="text-sm">Class</span>
                        </label>
                        <!-- <label class="ml-4 block text-gray-600 font-bold">
                            <input name="type" class="mr-2 leading-tight" type="radio" value="teacher" disabled>
                            <span class="text-sm">Teacher</span>
                        </label> -->
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <div>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Month
                        </label>
                    </div>
                    <div class="block text-gray-600 font-bold">
                        <div class="relative">
                            <select name="month" class="block font-bold appearance-none w-full bg-gray-200 border border-gray-200 text-gray-600 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="" class="text-center">--Select Month--</option>
                                @foreach ($months as $month => $values)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Generate</button>
                </div>
            </form>
            
            <div class="w-full px-6 py-6">
                @foreach ($attendances as $classid => $datevalues)
                    <h2 class="bg-gray-600 text-white font-semibold uppercase px-4 py-3">
                        class {{ $classid }}
                    </h2>
                    <div class="flex flex-col bg-gray-200 mb-6">
                        @foreach ($datevalues as $key => $attendancevals)
                            <div class="text-left text-gray-800 py-2 px-4 font-semibold">
                                <b><span >{{ $key }}</span></b>
                                <div class="flex flex-col justify-between bg-gray-100">
                                    @foreach ($attendancevals as $vals => $attendance)
                                        <div class="flex flex-row justify-between w-64">
                                            <div class="text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $attendance->student->user->name }}</div>
                                            <div class="text-sm text-left text-gray-600 py-2 px-4 font-semibold">
                                                @if ($attendance->attendence_status)
                                                    <span class="text-xs text-white bg-green-500 px-2 py-1 rounded-custom">P</span>
                                                @else
                                                    <span class="text-xs text-white bg-red-500 px-2 py-1 rounded-custom">A</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>   
        </div>

        @endrole

        {{-- @role('teacher')

        <div class="w-full block mt-8">
            <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        
                <div class="w-full sm:w-1/2 mr-2 mb-6">
                    <h3 class="text-gray-700 uppercase font-bold mb-2">Class List</h3>
                    <div class="flex flex-wrap items-center">
                        @foreach ($teacher->classes as $class)
                            <div class="w-full sm:w-1/2 text-center border border-gray-400 rounded">
                                <div class="text-gray-800 uppercase font-semibold px-4 py-4 mb-2">{{ $class->class_name }}</div>
                                <a href="{{ route('teacher.attendance.create',$class->id) }}" class="bg-green-600 inline-block mb-4 text-xs text-white uppercase font-semibold px-4 py-2 border border-gray-200 rounded">Manage Attendence</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="w-full sm:w-1/2 ml-2 mb-6">
                    <h3 class="text-gray-700 uppercase font-bold mb-2">Subject List</h3>
                    <div class="flex items-center bg-gray-600 rounded-tl rounded-tr">
                        <div class="w-1/3 text-left text-white py-2 px-4 font-semibold">Code</div>
                        <div class="w-1/3 text-left text-white py-2 px-4 font-semibold">Subject</div>
                        <div class="w-1/3 text-right text-white py-2 px-4 font-semibold">Teacher</div>
                    </div>
                    @foreach ($teacher->subjects as $subject)
                        <div class="flex items-center justify-between border border-gray-200">
                            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->subject_code }}</div>
                            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->name }}</div>
                            <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-medium">{{ $subject->teacher->user->name }}</div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>

        @endrole --}}
        
    </div>
</x-app-layout>