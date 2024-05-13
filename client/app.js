document.addEventListener('DOMContentLoaded', () => {
    const addDriverForm = document.getElementById('addDriverForm');
    const errorMessage = document.getElementById('errorMessage');
    const driverListContainer = document.getElementById('driverList');
    const modal = document.getElementById('confirmModal');

    // Call refreshDriverList function once when the page loads
    refreshDriverList();

    addDriverForm.addEventListener('submit', handleAddDriver);

    // Function to handle adding a new driver
    async function handleAddDriver(event) {
        event.preventDefault();

        const formData = new FormData(addDriverForm);
        const name = formData.get('name');

        try {
            await addDriver(name);
            addDriverForm.reset();
            errorMessage.textContent = '';
            refreshDriverList();
        } catch (error) {
            console.error(error);
            errorMessage.textContent = 'An error occurred while adding the driver';
        }
    }

    // Function to make POST request to add a new driver
    async function addDriver(name) {
        const response = await fetch('http://localhost:3000/api/drivers', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name })
        });
        if (!response.ok) {
            throw new Error('Failed to add driver');
        }
    }

    // Function to fetch and display the list of drivers
    async function refreshDriverList() {
        try {
            const drivers = await fetchDrivers();
            renderDriverTable(drivers);
        } catch (error) {
            console.error(error);
            errorMessage.textContent = 'An error occurred while fetching drivers';
        }
    }

    // Function to make GET request to fetch drivers
    async function fetchDrivers() {
        const response = await fetch('http://localhost:3000/api/drivers');
        if (!response.ok) {
            throw new Error('Failed to fetch drivers');
        }
        return response.json();
    }

    // Function to render the driver list as a table
    function renderDriverTable(drivers) {
        driverListContainer.innerHTML = ''; // Clear previous content
        const table = document.createElement('table');
        table.innerHTML = `
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ${drivers.map(driver => renderDriverRow(driver)).join('')}
            </tbody>
        `;
        driverListContainer.appendChild(table);
    }

    // Function to render each row of the driver table
    function renderDriverRow(driver) {
        return `
            <tr>
                <td>${driver.name}</td>
                <td>${driver.image}</td>
                <td>${driver.schedule}</td>
                <td>
                    <button class="delete-button" data-id="${driver._id}">Delete</button>
                </td>
            </tr>
        `;
    }

    // Event listener for handling deletion of a driver
    driverListContainer.addEventListener('click', handleDeleteDriver);

    // Function to handle deletion of a driver
    async function handleDeleteDriver(event) {
        if (event.target.classList.contains('delete-button')) {
            showModal(event.target.dataset.id);
        }
    }

    // Function to display the confirmation modal for delete action
    function showModal(driverId) {
        modal.style.display = 'block'; // Show the modal
        const confirmButton = document.getElementById('confirmButton');
        // Event listener for confirmation button
        confirmButton.onclick = async () => {
            await deleteDriver(driverId);
            refreshDriverList();
            modal.style.display = 'none'; // Hide the modal after deletion
        };
        const cancelButton = document.getElementById('cancelButton');
        // Event listener for cancel button
        cancelButton.onclick = () => {
            modal.style.display = 'none'; // Hide the modal without deleting
        };
    }

    // Function to make DELETE request to delete a driver
    async function deleteDriver(driverId) {
        const response = await fetch(`http://localhost:3000/api/drivers/${driverId}`, {
            method: 'DELETE'
        });
        if (!response.ok) {
            throw new Error('Failed to delete driver');
        }
    }
});

// Function to confirm delete action (if required)
function confirmPopup(message) {
    return confirm(message);
}

