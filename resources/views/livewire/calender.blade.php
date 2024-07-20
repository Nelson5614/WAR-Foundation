<div>
    <div id="calendar"></div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid', 'interaction' ],
                events: @json($tasks),
                selectable: true,
                editable: true,
                eventDrop: function(info) {
                    @this.call('updateTask', {
                        id: info.event.id,
                        start: info.event.start.toISOString(),
                        end: info.event.end ? info.event.end.toISOString() : null
                    });
                },
                eventResize: function(info) {
                    @this.call('updateTask', {
                        id: info.event.id,
                        start: info.event.start.toISOString(),
                        end: info.event.end.toISOString()
                    });
                },
                select: function(info) {
                    var title = prompt('Enter Task Title:');
                    if (title) {
                        @this.call('addTask', {
                            title: title,
                            start: info.startStr,
                            end: info.endStr
                        });
                    }
                },
                eventClick: function(info) {
                    if (confirm('Do you want to delete this task?')) {
                        @this.call('deleteTask', info.event.id);
                    }
                }
            });
            calendar.render();
        });
    </script>
    @endpush
</div>
