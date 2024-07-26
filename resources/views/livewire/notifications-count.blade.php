<div>

    <a href="{{ route('counselor.notifications') }}"
        wire:click.prevent="markAsRead"
       style="text-decoration: none;"
       class="flex items-center text-white opacity-75 hover:opacity-100 py-3 pl-6 nav-item">
        <i class="bi bi-bell mr-3"></i>
        Notifications
        @if ($notificationCount > 0)
            <span class="inline-flex items-center justify-center ml-2 w-6 h-6 text-white bg-red-500 rounded-full">
                {{ $notificationCount }}
            </span>
        @endif
    </a>

 {{-- Since the notification button only cleares the notification count but doesnt redirect to the notifications route, i am adding this javascript and see if it will work --}}

<script>
  document.addEventListener('livewire:load', function () {
        Livewire.on('redirectToNotifications', function () {
            // Redirect to the notifications route
            window.location.href = "{{ route('counselor.notifications') }}";
        });
    });


</script>
</div>
