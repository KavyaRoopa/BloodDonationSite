function fetchDonors() {
    fetch('fetch_donors.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#donors-table tbody');
            tableBody.innerHTML = ''; // Clear previous data

            data.forEach(donor => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${donor.donor_name}</td>
                    <td>${donor.blood_group}</td>
                    <td>${donor.donation_date}</td>
                    <td>${donor.receipt_number}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching donors:', error));
}
