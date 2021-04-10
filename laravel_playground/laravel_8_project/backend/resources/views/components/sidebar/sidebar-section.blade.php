<aside class="flex-shrink-0 w-64 flex flex-col border-r transition-all duration-300 shadow-md" :class="{ '-ml-64': !sidebarOpen }">
  <div class="flex p-6 h-16 bg-gray-100 border-b border-gray-100">
    <!-- Logo -->
    <div class="flex-shrink-0 flex items-center">
      <a href="{{ route('dashboard') }}">
          <x-jet-application-mark class="block h-9 w-auto" />
      </a>
    </div>
  </div>
  <nav class="flex-1 flex flex-col bg-white">
      <a href="#" class="p-2">Nav Link 1</a>
      <a href="#" class="p-2">Nav Link 2</a>
      <a href="#" class="p-2">Nav Link 3</a>
  </nav>
</aside>