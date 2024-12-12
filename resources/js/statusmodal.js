function showStatusModal(customerId) {
    // Fetch customer data using AJAX or a predefined array
    const customer = getCustomerData(customerId); // Replace with actual data fetching logic
    document.getElementById('customerName').value = customer.name;
    document.getElementById('customerAddress').value = customer.address;
    document.getElementById('statusModal').classList.add('show');
    document.getElementById('statusModal').style.display = 'block';
}

function updateStatus(newStatus) {
    alert(`Status updated to: ${newStatus}`);
    document.getElementById('statusModal').classList.remove('show');
    document.getElementById('statusModal').style.display = 'none';
}

function getCustomerData(customerId) {
    // Mock customer data
    return {
        id: customerId,
        name: "John Doe",
        address: "123 Main Street",
    };
}
