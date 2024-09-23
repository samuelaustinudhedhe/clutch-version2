{{-- <div x-data="{
    features: [{ name: 'ABS', value: '' }],
    addFeature() {
        this.features.push({ name: '', value: '' });
    },
    removeFeature(index) {
        this.features.splice(index, 1);
    }
}">
    <!-- Dynamic Form -->
    <template x-for="(feature, index) in features" :key="index">
        <div class="flex gap-4 mb-4">
            <!-- Feature Name Input -->
            <div class="w-2/4">
                <label x-bind:for="'feature_' + index" class="block text-sm font-medium text-gray-700">Safety Feature</label>
                <input type="text" x-bind:id="'feature_' + index" x-model="feature.name" 
                       placeholder="Enter Feature Name"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                       wire:model="storeData.safety.features[index].name">
            </div>
            
            <!-- Feature Value Select -->
            <div class="w-1/4">
                <label x-bind:for="'feature_value_' + index" class="block text-sm font-medium text-gray-700">Enabled</label>
                <select x-bind:id="'feature_value_' + index" x-model="feature.value"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                        wire:model="storeData.safety.features[index].value">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <!-- Remove Button -->
            <div class="w-1/4 flex items-end">
                <button type="button" @click="removeFeature(index)" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
            </div>
        </div>
    </template>

    <!-- Add New Feature Button -->
    <button type="button" @click="addFeature()" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Add Feature</button>
</div> --}}

works but un finished 