<aside class="flex-shrink-0 w-64 flex flex-col border-r transition-all duration-300 shadow-md" :class="{ '-ml-64': !sidebarOpen }">
  <div class="flex p-6 h-16 bg-gray-100 border-b border-gray-100">
    <!-- Logo -->
    <div class="flex-shrink-0 flex items-center">
      <a href="{{ route('dashboard') }}">
          <x-jet-application-mark class="block h-9 w-auto" />
      </a>
    </div>
  </div>
  <nav class="flex-1 flex flex-col">
    <a href="#" x-data="{show:false}" class="w-full flex flex-col py-3" @click="show=!show">
      <div 
        class="w-full flex justify-between px-3 py-3 duration-200 ease-out" 
        :class="{'bg-gray-200':show}">
          <div class="flex">
            <i class="material-icons fill-current text-gray-100">image</i>
            <div class="relative menu-text ml-4">Pages</div>
          </div>
          <span class="transition ease-out duration-200 ease-out material-icons transform"
            :class="{'rotate-180':show}">  arrow_drop_down </span>
      </div>
      <div x-show="show" class="transition duration-200 ease-out mt-2">
          <div class="w-full flex px-3 mx-3 hover:bg-gray-200 duration-200 ease-out rounded py-3" @click.stop>
              <span class="w-6 text-center text-xs">P</span>
              <div class="relative text-xs font-light menu-text ml-4">
                Link1 
              </div>
          </div>
          <div class="w-full flex px-3 mx-3 hover:bg-gray-200 duration-200 ease-out rounded py-3" @click.stop>
              <span class="w-6 text-center text-xs">RS</span>
              <div class="relative text-xs font-light menu-text  ml-4">
                Link2
              </div>
          </div>
      </div>
    </a>
  </nav>
</aside>