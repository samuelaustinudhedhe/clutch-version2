<div>
    <x-div>
        <p class="mb-4">Discribe the current issues/faults if the Vehicle has</p>

        <x-textarea height="100px" placeholder="Describe Issues/Faults" wire:model="storeData.details.faults"></x-textarea>

    </x-div>

    <x-div>
        <p class="mb-4">List the current modifications done on the Vehicle</p>

        <x-textarea height="120px" placeholder="Modifications and improvements" wire:model="storeData.details.modifications"></x-textarea>

    </x-div>
</div>
