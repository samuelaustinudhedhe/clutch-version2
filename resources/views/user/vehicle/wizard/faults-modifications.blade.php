<div>
    <x-div>
        <p class="mb-4">Discribe the current issues/faults the Vehicle has</p>

        <x-textarea height="100px" placeholder="Describe Issues/Faults" wire:model="storeData.faults"></x-textarea>

    </x-div>

    <x-div>
        <p class="mb-4">List the current modifications Done on the Vehicle</p>

        <x-textarea height="120px" placeholder="Modifications and improvements" wire:model="storeData.modifications"></x-textarea>

    </x-div>
</div>
