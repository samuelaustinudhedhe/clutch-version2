<div>
    <!-- Modal -->
    <div id="delete-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
            <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Are you sure you want to delete?
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Yes, Delete
                    </button>
                </form>
                <button onclick="hideDeleteModal();"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    <script>
        function showDeleteModal(element) {
            const roleId = element.getAttribute('data-role-id');
            const deleteForm = document.getElementById('delete-form');
            deleteForm.action = `/admin/roles/destroy/${roleId}`; // Update this if your route is different
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }
    </script>
</div>
