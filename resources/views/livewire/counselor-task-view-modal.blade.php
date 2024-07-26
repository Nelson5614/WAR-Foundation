<div>
    @if ($showModal)
        <div class="modal fade show d-block" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Task Details</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>task Title:</strong> {{ $task->title }}</p>
                        <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $task->end_date }}</p>
                        <p><strong>task Status:</strong> {{ $task->status }}</p>
                        <p><strong>Description:</strong> {{ $task->description }}</p>
                        <!-- Add other project details as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-blue-800 py-2 px-2 text-white rounded-md" wire:click="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

