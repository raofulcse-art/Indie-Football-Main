document.addEventListener("DOMContentLoaded", () => {
    console.log("Team search connected");

    const searchInput = document.getElementById("teamSearchInput");

    if (!searchInput) {
        console.error("Team search input was not found.");
        return;
    }

    searchInput.addEventListener("input", handleSearchInput);

    loadTeams();
});

let currentPage = 1;
let lastPage = 1;
let currentSearch = "";
let searchTimeout = null;

/**
 * Render the teams and pagination controls.
 *
 * @param {Array} teams
 */
function renderTeams(teams) {
    const container = document.querySelector(".team-list-container");

    if (!container) {
        console.error("Team list container was not found.");
        return;
    }

    let html = "";

    if (teams.length === 0) {
        html += `
            <div class="team-list-message">
                No teams were found.
            </div>
        `;
    } else {
        teams.forEach(team => {
            const teamName = escapeHtml(team.name);
            const firstLetter = teamName.charAt(0).toUpperCase();

            const memberText =
                Number(team.member_count) === 1
                    ? "Member"
                    : "Members";

            html += `
                <article class="team-row">
                    <div class="team-identity">
                        <div class="team-avatar">
                            ${firstLetter}
                        </div>

                        <div class="team-name">
                            ${teamName}
                        </div>
                    </div>

                    <div class="team-id">
                        #${team.id}
                    </div>

                    <div class="team-member-count">
                        ${team.member_count} ${memberText}
                    </div>

                    <div class="team-actions">
                        <button
                            type="button"
                            class="team-show-button"
                        >
                            Show
                        </button>
                    </div>
                </article>
            `;
        });
    }

    html += `
        <div class="team-list-pagination">
            <button
                type="button"
                class="pagination-btn prevBtn"
            >
                Previous
            </button>

            <p class="team-page-number">
                Page
                <span>${currentPage}</span>
                of
                <span>${lastPage}</span>
            </p>

            <button
                type="button"
                class="pagination-btn nextBtn"
            >
                Next
            </button>
        </div>
    `;

    container.innerHTML = html;

    const nextButton = document.querySelector(".nextBtn");
    const previousButton = document.querySelector(".prevBtn");

    nextButton.addEventListener("click", () => {
        nextPage();
    });

    previousButton.addEventListener("click", () => {
        prevPage();
    });
}

/**
 * Load teams from the Laravel API.
 *
 * @param {number} page
 */
async function loadTeams(page = 1) {
    currentPage = page;

    showLoadingMessage();

    const queryParameters = new URLSearchParams();

    queryParameters.set("page", currentPage);

    if (currentSearch !== "") {
        queryParameters.set("search", currentSearch);
    }

    try {
        const response = await fetch(
            `/api/teams?${queryParameters.toString()}`,
            {
                method: "GET",
                headers: {
                    Accept: "application/json"
                }
            }
        );

        if (!response.ok) {
            throw new Error(
                `Unable to load teams. Status: ${response.status}`
            );
        }

        const data = await response.json();

        lastPage = data.meta.last_page;

        renderTeams(data.data);

        updatePaginationButtons();
    } catch (error) {
        console.error(error);

        showErrorMessage();
    }
}

/**
 * Update the visibility of Previous and Next buttons.
 */
function updatePaginationButtons() {
    const nextButton = document.querySelector(".nextBtn");
    const previousButton = document.querySelector(".prevBtn");

    if (!nextButton || !previousButton) {
        return;
    }

    /*
     * Only one page exists.
     */
    if (lastPage <= 1) {
        previousButton.classList.add("invinsible");
        nextButton.classList.add("invinsible");
        return;
    }

    /*
     * User is on the first page.
     */
    if (currentPage === 1) {
        previousButton.classList.add("invinsible");
        nextButton.classList.remove("invinsible");
        return;
    }

    /*
     * User is on a middle page.
     */
    if (currentPage > 1 && currentPage < lastPage) {
        previousButton.classList.remove("invinsible");
        nextButton.classList.remove("invinsible");
        return;
    }

    /*
     * User is on the final page.
     */
    if (currentPage === lastPage) {
        previousButton.classList.remove("invinsible");
        nextButton.classList.add("invinsible");
    }
}

/**
 * Load the next page.
 */
function nextPage() {
    if (currentPage < lastPage) {
        loadTeams(currentPage + 1);
    }
}

/**
 * Load the previous page.
 */
function prevPage() {
    if (currentPage > 1) {
        loadTeams(currentPage - 1);
    }
}

/**
 * Run the search after the user stops typing.
 *
 * @param {InputEvent} event
 */
function handleSearchInput(event) {
    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {
        currentSearch = event.target.value.trim();

        /*
         * A new search must always begin from page one.
         */
        loadTeams(1);
    }, 400);
}

/**
 * Show a loading message while waiting for the API.
 */
function showLoadingMessage() {
    const container = document.querySelector(".team-list-container");

    if (!container) {
        return;
    }

    container.innerHTML = `
        <div class="team-list-message">
            Loading teams...
        </div>
    `;
}

/**
 * Show an error message if the request fails.
 */
function showErrorMessage() {
    const container = document.querySelector(".team-list-container");

    if (!container) {
        return;
    }

    container.innerHTML = `
        <div class="team-list-message">
            Unable to load teams. Please try again.
        </div>
    `;
}

/**
 * Protect the rendered HTML from unsafe team names.
 *
 * @param {string} value
 * @returns {string}
 */
function escapeHtml(value) {
    const temporaryElement = document.createElement("div");

    temporaryElement.textContent = String(value);

    return temporaryElement.innerHTML;
}