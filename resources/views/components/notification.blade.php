@if (Session::has('success'))
    <div id="toast-undo" class="flex items-center w-full max-w-xs p-4 text-slate-500 bg-white rounded-lg shadow fixed right-8" role="alert">
        <div class="flex items-center gap-x-2">
            <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor" height="36" width="36"><path fill="rgb(74,222,128)" d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z" id="mainIconPathAttribute" stroke-width="0" stroke="#ff0000"></path></svg>     
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

