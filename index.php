<?php
// db.php
$conn = new mysqli('localhost', 'root', '', 'sampledb');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Single-Line Form & Toggle</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    form { display: flex; gap: 10px; margin-bottom: 20px; }
    input[type="text"], input[type="number"] { padding: 5px; flex: 1; }
    button, input[type="submit"] { padding: 6px 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 8px; border: 1px solid #ddd; text-align: center; }
    .toggle-btn { cursor: pointer; }
  </style>
</head>
<body>
<h2>User Input</h2>
<form id="userForm">
  <input type="text" name="name" placeholder="Name" required>
  <input type="number" name="age" placeholder="Age" required min="0">
  <input type="submit" value="Submit">
</form>

<h2>All Records</h2>
<table id="usersTable">
  <thead>
    <tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>
  </thead>
  <tbody></tbody>
</table>

<script>
const apiUrl = 'api.php';

// Fetch & display
async function fetchRecords() {
  const res = await fetch(apiUrl + '?action=fetch');
  const rows = await res.json();
  const tbody = document.querySelector('#usersTable tbody');
  tbody.innerHTML = rows.map(r => `
    <tr data-id="${r.id}">
      <td>${r.id}</td><td>${r.name}</td><td>${r.age}</td>
      <td>${r.status}</td>
      <td><button class="toggle-btn">${r.status == 1 ? 'Deactivate' : 'Activate'}</button></td>
    </tr>`).join('');
  document.querySelectorAll('.toggle-btn').forEach(btn => {
    btn.onclick = async () => {
      const tr = btn.closest('tr');
      const id = tr.dataset.id;
      await fetch(apiUrl + '?action=toggle&id=' + id);
      await fetchRecords();
    };
  });
}

// Submit form
document.getElementById('userForm').onsubmit = async e => {
  e.preventDefault();
  const form = e.target;
  const formData = new URLSearchParams(new FormData(form));
  await fetch(apiUrl + '?action=add', {
    method: 'POST',
    body: formData
  });
  form.reset();
  fetchRecords();
};

// Initialize
fetchRecords();
</script>
</body>
</html>
