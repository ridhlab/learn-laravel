@if (Session::has('success'))
    <div id="toast-undo" class="flex items-center w-full max-w-xs p-4 text-slate-500 bg-white rounded-lg shadow fixed right-8 top-8" role="alert">
        <div class="flex items-center gap-x-2">
            <x-sui-check-circle class="w-9 h-9 text-green-500"/>
            <p class="text-sm font-normal">
                {{Session::get('success')}}
            </p>
        </div>
        <div class="flex items-center ms-auto space-x-2 rtl:space-x-reverse bg-green">
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 text-slate-500" data-dismiss-target="#toast-undo" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div id="toast-undo" class="flex items-center w-full max-w-xs p-4 text-slate-500 bg-white rounded-lg shadow fixed right-8 top-8" role="alert">
        <div class="flex items-center gap-x-2">
            <x-sui-cross-circle class="w-9 h-9 text-red-500"/>
            <p class="text-sm font-normal">
                {{Session::get('error')}}
            </p>
        </div>
        <div class="flex items-center ms-auto space-x-2 rtl:space-x-reverse bg-green">
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 text-slate-500" data-dismiss-target="#toast-undo" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
@endif

