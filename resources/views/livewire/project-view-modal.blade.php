<div>
    @if ($showModal)
        <div class="modal fade show d-block" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Project Details</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Project Title:</strong> {{ $project->title }}</p>
                        <p><strong>Project Manager:</strong> {{ $project->manager }}</p>
                        <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $project->end_date }}</p>
                        <p><strong>Project Status:</strong> {{ $project->status }}</p>
                        <p><strong>Description:</strong> {{ $project->description }}</p>
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

