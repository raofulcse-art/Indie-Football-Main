document.addEventListener("DOMContentLoaded", () => {
    console.log("Connected");
    loadUsers();
});

let currentPage = 1;
let lastPage = 1;

function renderUsers(users) {
    let html = '';

    users.forEach(user => {
        html += `
            <div class="user-row">
                <div class="user-identity">
                    <div class="user-name">${user.name}</div>
                </div>
                <div class="user-email">${user.email}</div>
                <div class="user-role user-role--admin">${user.role}</div>
                <div class="user-actions">
                    <button class="btn-icon btn-edit">✎</button>
                    <button class="btn-icon btn-delete">🗑</button>
                </div>
            </div>
        `;
    });

    html += `
        <div class="user-list-pagination">
            <button class="pagination-btn prevBtn">Previous</button>
            <button class="pagination-btn nextBtn">Next</button>
        </div>
    `;

    document.querySelector('.user-list-container').innerHTML = html;

    document.querySelector('.nextBtn').addEventListener('click', () => {
        nextPage();
    });

    document.querySelector('.prevBtn').addEventListener('click', () => {
        prevPage();
    });
}

async function loadUsers(page = 1) {
    currentPage = page;

    let res = await fetch(`/api/users?page=${currentPage}`);
    let data = await res.json();

    renderUsers(data.data);

    lastPage = data.meta.last_page;

    const nextBtn = document.querySelector('.nextBtn');
    const prevBtn = document.querySelector('.prevBtn');

    if (currentPage === 1) {
        prevBtn.classList.add('invinsible');
        nextBtn.classList.remove('invinsible');
    } else if (currentPage > 1 && currentPage < lastPage) {
        prevBtn.classList.remove('invinsible');
        nextBtn.classList.remove('invinsible');
    } else if (currentPage === lastPage) {
        prevBtn.classList.remove('invinsible');
        nextBtn.classList.add('invinsible');
    }
}

function nextPage() {
    if (currentPage < lastPage) {
        loadUsers(currentPage + 1);
    }
}

function prevPage() {
    if (currentPage > 1) {
        loadUsers(currentPage - 1);
    }
}