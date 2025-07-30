function searchContacts() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let table = document.getElementById('contactsTable');
    let rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
        let name = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
        rows[i].style.display = name.includes(input) ? '' : 'none';
    }
}
