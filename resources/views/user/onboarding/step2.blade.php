<div>
    <h2>Profile Setup</h2>
    <textarea wire:model="profileDetails.bio" placeholder="Bio"></textarea>
    <input type="file" wire:model="profileDetails.avatar">
    <button wire:click="prevStep">Previous</button>
    <button wire:click="nextStep">Next</button>
</div>